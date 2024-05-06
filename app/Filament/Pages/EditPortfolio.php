<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;


class EditPortfolio extends Page
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static ?string $navigationLabel = 'Section Settings';
    protected static ?string $navigationGroup = 'Portfolio';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.edit-section';

    public function mount(): void
    {
        $this->form->fill(auth()->user()->portfolio->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('span')->nullable(),
                TextInput::make('title')->required(),
                Textarea::make('description')->nullable()->columnSpanFull()->rows(3),
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

            auth()->user()->portfolio->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}

