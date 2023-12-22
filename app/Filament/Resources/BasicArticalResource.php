<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BasicArtical;
use Filament\Resources\Resource;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BasicArticalResource\Pages;
use App\Filament\Resources\BasicArticalResource\RelationManagers;

class BasicArticalResource extends Resource
{
    protected static ?string $model = BasicArtical::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = "Articals";
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = "الفصول";
    protected static ?string $pluralModelLabel = "الفصول";

    protected static ?string $navigationGroup = 'الروايات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('الفصل')
                            ->schema([
                                Forms\Components\TextInput::make('header')
                                    ->label('عنوان الفصل')
                                ,
                                Forms\Components\Textarea::make('shortDesc')
                                    ->label('شرح مبسط')
                                    ->autosize()
                                    ->maxLength(255)
                                    ->rows(5),
                                Forms\Components\Textarea::make('body')
                                    ->label('محتوى الفصل')
                                    ->autosize()
                                    ->rows(10),

                            ]),


                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('الرواية')
                            ->schema([
                                Forms\Components\Select::make('book_id')
                                    ->relationship('book', 'name')
                                    ->reactive()
                                    ->label('اسم الرواية')
                                    ->required()
                                    ->native(false),
                            ]),

                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('img')
                                    ->image()
                                    ->label('Image')
                                    ->required()
                                    ->imageEditor()
                                    ->hint("If you want to use the editor, ensure that you upload the image by saving the information first, rather than doing it on a new entry.")
                                    ->dehydrateStateUsing(function ($state) {
                                        $files = array_values($state ?? []);
                                        return end($files);
                                    })
                                    ->directory("img"),
                            ]),

                    ]),

                // Forms\Components\Group::make()
                //     ->schema([

                //     ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('header')
                    ->searchable()
                    ->label('عنوان الفصل')
                    ->sortable(),
                Tables\Columns\TextColumn::make('book.name')
                    ->searchable()
                    ->label('الرواية التابع لها')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),


            ])->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('اسم الرواية')
                    ->relationship('book', 'name')
                    ->native(false),
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
                Tables\Actions\CreateAction::make()
                    ->label("فصل جديد"),
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
            'index' => Pages\ListBasicArticals::route('/'),
            'create' => Pages\CreateBasicArtical::route('/create'),
            'edit' => Pages\EditBasicArtical::route('/{record}/edit'),
        ];
    }
}
