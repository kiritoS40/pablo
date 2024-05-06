<?php

namespace App\Filament\Resources\EducationItemResource\Pages;

use App\Filament\Resources\EducationItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationItems extends ListRecords
{
    protected static string $resource = EducationItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
