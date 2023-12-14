<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BasicArticalResource\Pages;
use App\Filament\Resources\BasicArticalResource\RelationManagers;
use App\Models\BasicArtical;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;

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
                                    ->label('اسم الرواية')
                                    ->required()
                                    ->native(false),
                            ]),

                        Forms\Components\Section::make('Publish Date')
                            ->schema([
                                Forms\Components\DatePicker::make('published_at')
                                    ->required()
                                    ->default(now()),

                            ]),
                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('img')
                                    ->image()
                                    ->label('Image')
                                    ->imageEditor()
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
                    ->limit(25)
                    ->sortable(),
                Tables\Columns\TextColumn::make('book.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\ImageColumn::make('img')
                    ->width(100)
                    ->height(100)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable()
                    ->toggleable(),


            ])->defaultSort('published_at', 'desc')
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
