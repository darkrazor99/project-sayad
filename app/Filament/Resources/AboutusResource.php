<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Aboutus;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AboutusResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AboutusResource\RelationManagers;

class AboutusResource extends Resource
{
    protected static ?string $model = Aboutus::class;
    protected static ?string $slug = "About-Us";
    protected static ?int $navigationSort = 5;

    protected static ?string $navigationLabel = "About Us";
    protected static ?string $pluralModelLabel = "About Us";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'About us';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('h1')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p')
                                    ->rows(5)
                                    ->autosize()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sh1')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sh2')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sh3')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('sh4')
                                    ->required()
                                    ->maxLength(255),
                            ])
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Arabic')
                            ->schema([
                                Forms\Components\TextInput::make('h1-ar')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p-ar')
                                    ->rows(5)
                                    ->autosize()
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('sh1-ar')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('sh2-ar')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('sh3-ar')
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('sh4-ar')
                                    ->required()
                                    ->maxLength(255),

                            ])
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('img')
                                    ->required()
                                    ->image()
                                    ->label('Image')
                                    ->imageEditor()
                                    ->directory("img"),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('h1')
                    ->words(5),
                Tables\Columns\TextColumn::make('h1-ar')
                    ->words(5),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            'index' => Pages\ListAboutuses::route('/'),
            // 'create' => Pages\CreateAboutus::route('/create'),
            'edit' => Pages\EditAboutus::route('/{record}/edit'),
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
