<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PdfCategoryResource\Pages;
use App\Filament\Resources\PdfCategoryResource\RelationManagers;
use App\Models\PdfCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PdfCategoryResource extends Resource
{
    protected static ?string $model = PdfCategory::class;
    protected static ?string $navigationGroup = 'Pdf';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make("English")
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->unique(ignorable: fn($record) => $record)
                                    ->autofocus(),
                                Forms\Components\Textarea::make('description')
                                    ->autosize()
                                    ->rows(5),
                            ])
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make("Arabic")
                            ->schema([
                                Forms\Components\TextInput::make('name_ar')
                                    ->required()
                                    ->label('name')
                                    ->live(onBlur: true)
                                    ->unique(ignorable: fn($record) => $record),
                                Forms\Components\Textarea::make('description_ar')
                                    ->label('description')
                                    ->autosize()
                                    ->rows(5),
                            ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name_ar')
                    ->label('name in Arabic')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),

            ])->defaultSort('name', 'desc')
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
            'index' => Pages\ListPdfCategories::route('/'),
            'create' => Pages\CreatePdfCategory::route('/create'),
            'edit' => Pages\EditPdfCategory::route('/{record}/edit'),
        ];
    }
}
