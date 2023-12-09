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

    protected static ?string $navigationGroup = 'Articals';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Artical')
                            ->schema([
                                Forms\Components\TextInput::make('header')
                                    ->label('Artical Title')
                                ,
                                Forms\Components\Textarea::make('shortDesc')
                                    ->label('Short Description')
                                    ->autosize()
                                    ->rows(5),
                                Forms\Components\Textarea::make('body')
                                    ->label('Artical Body')
                                    ->autosize()
                                    ->rows(10),

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
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Catagory')
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->native(false),
                            ]),
                        Forms\Components\Section::make('Options')
                            ->schema([
                                Forms\Components\Toggle::make('isArabic')
                                    ->label('Arabic Artical')
                                    ->helperText('Is this artical in Arabic?'),

                                Forms\Components\Toggle::make('hasVid')
                                    ->live()
                                    ->helperText('Does this artical have a Video?')
                                    ->label('video'),

                                Forms\Components\Toggle::make('hasPdf')
                                    ->live()
                                    ->helperText('Does this artical have a Pdf?')
                                    ->label('Pdf'),

                            ]),
                        Forms\Components\Section::make('Video')
                            ->schema([

                                Forms\Components\FileUpload::make('video')
                                    ->directory("vid")
                                    ->openable()
                                    ->label('Video')
                                    ->helperText('We only support Mp4, WebM and Ogg formats')
                                    ->downloadable()
                                    ->acceptedFileTypes([
                                        'video/mp4',
                                        'video/ogg',
                                        'video/webm',
                                    ]),

                            ])->hidden(fn(Get $get) => $get('hasVid') != true)->collapsible(),
                        Forms\Components\Section::make('Pdf')
                            ->schema([
                                Forms\Components\FileUpload::make('pdf')
                                    ->directory("pdf")
                                    ->label('Video')
                                    ->openable()
                                    ->downloadable()
                                    ->acceptedFileTypes(['application/pdf']),

                            ])->hidden(fn(Get $get) => $get('hasPdf') != true)->collapsible(),
                        Forms\Components\Section::make('Publish Date')
                            ->schema([
                                Forms\Components\DatePicker::make('published_at')
                                    ->required()
                                    ->default(now()),

                            ])

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
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('isArabic')
                    ->label('written in Arabic')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('hasVid')
                    ->boolean()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('hasPdf')
                    ->boolean()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('img')
                    ->width(100)
                    ->height(100)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),


            ])->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->native(false),
                Tables\Filters\TernaryFilter::make('isArabic')
                ->label('Language')
                ->boolean()
                ->trueLabel('Only Arabic Articals')
                ->falseLabel('Only English Articals')
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
            'index' => Pages\ListBasicArticals::route('/'),
            'create' => Pages\CreateBasicArtical::route('/create'),
            'edit' => Pages\EditBasicArtical::route('/{record}/edit'),
        ];
    }
}
