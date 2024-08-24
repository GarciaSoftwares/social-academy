<?php

namespace App\Filament\Resources\RaffleCategoryResource\Pages;

use App\Filament\Resources\RaffleCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRaffleCategories extends ListRecords
{
    protected static string $resource = RaffleCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
