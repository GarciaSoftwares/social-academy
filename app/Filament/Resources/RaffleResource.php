<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RaffleResource\Pages;
use App\Filament\Resources\RaffleResource\RelationManagers;
use App\Models\Raffle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RaffleResource extends Resource
{
    protected static ?string $model = Raffle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('enterprise_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('raffle_category_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('ticket_price')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('starting_number')
                    ->required()
                    ->maxLength(255)
                    ->default(001),
                Forms\Components\TextInput::make('ticket_quantity')
                    ->required()
                    ->numeric()
                    ->default(200),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('display_tickets')
                    ->required(),
                Forms\Components\Toggle::make('display_ranking')
                    ->required(),
                Forms\Components\TextInput::make('theme'),
                Forms\Components\TextInput::make('data'),
                Forms\Components\DateTimePicker::make('release_at')
                    ->required(),
                Forms\Components\DateTimePicker::make('delivered_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('enterprise.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ticket_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('starting_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ticket_quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('status'),
                Tables\Columns\TextColumn::make('display_tickets'),
                Tables\Columns\IconColumn::make('display_ranking')
                    ->boolean(),
                Tables\Columns\TextColumn::make('release_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('delivered_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRaffles::route('/'),
            'create' => Pages\CreateRaffle::route('/create'),
            'view' => Pages\ViewRaffle::route('/{record}'),
            'edit' => Pages\EditRaffle::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    /**
     * Label of resource.
     *
     * @return string
     */
    public static function getModelLabel(): string
    {
        return __('Raffles');
    }
}
