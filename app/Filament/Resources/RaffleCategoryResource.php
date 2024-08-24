<?php

namespace App\Filament\Resources;

use App\Enums\Statuses\RaffleCategoryStatusEnum;
use App\Filament\Resources\RaffleCategoryResource\Pages;
use App\Filament\Resources\RaffleCategoryResource\RelationManagers;
use App\Models\RaffleCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RaffleCategoryResource extends Resource
{
    protected static ?string $model = RaffleCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('enterprise_id')
                    ->relationship('enterprise', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('dad_id')
                    ->relationship('dad', 'name'),
                Forms\Components\Select::make('son_id')
                    ->relationship('son', 'name'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options(RaffleCategoryStatusEnum::class)
                    ->required()
                ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('enterprise.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dad.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('son.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListRaffleCategories::route('/'),
            'create' => Pages\CreateRaffleCategory::route('/create'),
            'view' => Pages\ViewRaffleCategory::route('/{record}'),
            'edit' => Pages\EditRaffleCategory::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
