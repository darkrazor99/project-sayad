<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DrawingResource\Pages;
use App\Filament\Resources\DrawingResource\RelationManagers;
use App\Models\Drawing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DrawingResource extends Resource
{
    protected static ?string $model = Drawing::class;

    protected static ?string $navigationGroup = 'الرسومات';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\TextInput::make('header')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('shortDesc')
                    ->maxLength(255),
                Forms\Components\Textarea::make('body')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('img')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('published_at')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('header')
                    ->searchable(),
                Tables\Columns\TextColumn::make('shortDesc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('img')
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListDrawings::route('/'),
            'create' => Pages\CreateDrawing::route('/create'),
            'edit' => Pages\EditDrawing::route('/{record}/edit'),
        ];
    }
}
