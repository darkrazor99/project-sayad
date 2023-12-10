<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\GetInTouch;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GetInTouchResource\Pages;
use App\Filament\Resources\GetInTouchResource\RelationManagers;

class GetInTouchResource extends Resource
{
    protected static ?string $model = GetInTouch::class;
    protected static ?string $slug = "Get-In-Touch";
    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = "Get In Touch";
    protected static ?string $pluralModelLabel = "Get In Touch";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'About us';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Contact Info')
                            ->schema([
                                Forms\Components\Textarea::make('address')
                                    ->rows(5)
                                    ->autosize()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                            ])
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Contact Links')
                            ->schema([
                                Forms\Components\TextInput::make('twitter')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('facebook')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('linkedIn')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('Instagram')
                                    ->maxLength(255),

                            ])
                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address')
                    ->words(10),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
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
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListGetInTouches::route('/'),
            // 'create' => Pages\CreateGetInTouch::route('/create'),
            'edit' => Pages\EditGetInTouch::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
