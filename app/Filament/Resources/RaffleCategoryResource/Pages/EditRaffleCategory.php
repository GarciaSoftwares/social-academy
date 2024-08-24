<?php

namespace App\Filament\Resources\RaffleCategoryResource\Pages;

use App\Filament\Resources\RaffleCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRaffleCategory extends EditRecord
{
    protected static string $resource = RaffleCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
