<?php

namespace App\Filament\Resources\RaffleTicketResource\Pages;

use App\Filament\Resources\RaffleTicketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRaffleTickets extends ListRecords
{
    protected static string $resource = RaffleTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
