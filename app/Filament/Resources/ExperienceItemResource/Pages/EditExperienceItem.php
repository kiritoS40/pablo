<?php

namespace App\Filament\Resources\ExperienceItemResource\Pages;

use App\Filament\Resources\ExperienceItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExperienceItem extends EditRecord
{
    protected static string $resource = ExperienceItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
