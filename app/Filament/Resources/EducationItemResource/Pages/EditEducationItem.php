<?php

namespace App\Filament\Resources\EducationItemResource\Pages;

use App\Filament\Resources\EducationItemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationItem extends EditRecord
{
    protected static string $resource = EducationItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
