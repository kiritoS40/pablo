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

class EditContact extends Page
{
    use InteractsWithForms;
    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Contact';

    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.edit-section';

    public function mount(): void
    {
        $this->form->fill(auth()->user()->contact->attributesToArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('span')->nullable(),
                TextInput::make('email_icon')->nullable(),
                TextInput::make('email')->required(),
                TextInput::make('mobile_no_icon')->nullable(),
                TextInput::make('mobile_no')->required(),
                TextInput::make('button_text')->required(),
                TextInput::make('submit_link')->required(),
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

            auth()->user()->contact->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
