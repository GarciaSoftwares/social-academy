<?php

namespace App\Filament\Resources\RaffleTicketResource\Pages;

use App\Filament\Resources\RaffleTicketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRaffleTicket extends EditRecord
{
    protected static string $resource = RaffleTicketResource::class;

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
