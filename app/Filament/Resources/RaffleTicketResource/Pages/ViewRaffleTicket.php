<?php

namespace App\Filament\Resources\RaffleTicketResource\Pages;

use App\Filament\Resources\RaffleTicketResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRaffleTicket extends ViewRecord
{
    protected static string $resource = RaffleTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
