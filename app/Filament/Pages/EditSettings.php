<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;


class EditSettings extends Page
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Settings';
    protected static ?int $navigationSort = 5;

    protected static string $view = 'filament.pages.edit-section';

    public function mount(): void
    {
        $this->form->fill(auth()->user()->settings->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('header_logo')
                    ->disk('public')
                    ->directory('images')
                    ->image()
                    ->imageEditor()
                    ->required(),
                Textarea::make('footer_text')->required()->rows(3),
            ])
            ->columns(2)
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            auth()->user()->settings->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}

