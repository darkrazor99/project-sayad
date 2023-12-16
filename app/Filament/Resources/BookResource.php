<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationGroup = 'الروايات';
    protected static ?string $navigationLabel = "الروايات";
    protected static ?string $pluralModelLabel = "الروايات";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('مقال')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('اسم الرواية')
                                    ->required()
                                    ->maxLength(255)
                                ,
                                Forms\Components\TextInput::make('writerName')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('اسم الكاتب')
                                    ->required()
                                ,
                                Forms\Components\Textarea::make('shortDesc')
                                    ->label('شرح مبسط')
                                    ->autosize()
                                    ->rows(5)
                                    ->maxLength(255)
                                    ->columnSpanFull(),



                            ])->columns(2),



                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Category')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name_ar')
                                    ->label('Category')
                                    ->required()
                                    ->native(false),
                            ]),
                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('img')
                                    ->image()
                                    ->label('Image')
                                    ->imageEditor()
                                    ->required()
                                    ->hint("if you want to use the Editor make sure to save first")
                                    ->dehydrateStateUsing(function ($state) {
                                        $files = array_values($state ?? []);
                                        return end($files);
                                    })
                                    ->directory("img"),
                            ]),
                        Forms\Components\Section::make('Options')
                            ->schema([

                                Forms\Components\Toggle::make('isBublished')
                                    ->required()
                                    ->label('انشر الرواية')
                                    ->hint('اتركها مفعلة اذا اردت ان تنشر الرواية')
                                    ->default(true),
                            ])->hidden(),

                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('writerName')
                    ->searchable()
                    ->label('اسم الكاتب'),
                Tables\Columns\TextColumn::make('category.name_ar')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->label("آخر معاد تحديث")
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name_ar')
                    ->native(false),
                Tables\Filters\TernaryFilter::make('isBublished')
                    ->label('حالة النشر')
                    ->placeholder('جميع الروايات')
                    ->trueLabel('المنشورة فقط')
                    ->falseLabel('الغير منشورة فقط')
                    ->native(false)
                ,
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
                    ->label("رواية جديدة"),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
