<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideosResource\Pages;
use App\Filament\Resources\VideosResource\RelationManagers;
use App\Models\Videos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VideosResource extends Resource
{
    protected static ?string $model = Videos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Video';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('مقال')
                            ->schema([
                                Forms\Components\TextInput::make('header')
                                    ->label('عنوان')
                                    ->required()
                                    ->maxLength(255)
                                ,
                                Forms\Components\Textarea::make('shortDesc')
                                    ->label('شرح مبسط')
                                    ->autosize()
                                    ->rows(5)
                                    ->maxLength(255),

                                Forms\Components\Textarea::make('body')
                                    ->label('محتوى')
                                    ->autosize()
                                    ->required()
                                    ->rows(10),

                            ]),


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
                        Forms\Components\Section::make('Video')
                            ->schema([

                                Forms\Components\FileUpload::make('vid')
                                    ->directory("vid")
                                    ->openable()
                                    ->label('Video')
                                    ->helperText('We only support Mp4, WebM and Ogg formats')
                                    ->downloadable()
                                    ->required()

                                    ->acceptedFileTypes([
                                        'video/mp4',
                                        'video/ogg',
                                        'video/webm',
                                    ]),

                            ])

                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('header')
                    ->searchable()
                    ->label('عنوان')
                    ->sortable(),
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
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideos::route('/create'),
            'edit' => Pages\EditVideos::route('/{record}/edit'),
        ];
    }
}
