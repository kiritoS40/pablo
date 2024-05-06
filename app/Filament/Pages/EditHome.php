<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class EditHome extends Page
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Home';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.edit-section';

    public function mount(): void
    {
        $homeData = auth()->user()->home;
        if ($homeData) {
            $data = $homeData->toArray();
            $data['tags'] = json_decode($data['tags'], true);
            $this->form->fill($data);
        } else {
            $this->form->fill([
                'designation' => '',
                'intro' => '',
                'name' => '',
                'outro' => '',
                'short_description' => '',
                'tags' => [],
                'button_text' => '',
                'button_link' => '',
                'photo' => null,
            ]);
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('designation')->required(),
                TextInput::make('intro')->required(),
                TextInput::make('name')->required(),
                TextInput::make('outro')->required(),
                TextInput::make('short_description')->required(),
                TagsInput::make('tags')
                    ->rules(['array']),
                TextInput::make('button_text')->required(),
                TextInput::make('button_link')->required(),
                FileUpload::make('photo')
                    ->disk('public')
                    ->directory('images')
                    ->imageEditor()
                    ->required()
                    ->columnSpanFull(),
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

            auth()->user()->home->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
