<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfoResource\Pages;
use App\Filament\Resources\InfoResource\RelationManagers;
use App\Models\Info;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class InfoResource extends Resource
{
    protected static ?int $navigationSort = 4;

    protected static ?string $model = Info::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Home Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('mainh1')
                                    ->label('Main Heading 1')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mainh2')
                                    ->label('Main Heading 2')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('subh1')
                                    ->label('Sub Heading 1')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p1')
                                    ->label('Paragraph 1')
                                    ->rows(2)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('subh2')
                                    ->label('Sub Heading 2')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p2')
                                    ->label('Paragraph2')
                                    ->rows(2)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('subh3')
                                    ->label('Sub Heading 3')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p3')
                                    ->label('Paragraph 3')
                                    ->rows(2)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('subh4')
                                    ->label('Sub Heading 4')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p4')
                                    ->label('Paragraph 4')
                                    ->rows(2)
                                    ->autosize()
                                    ->maxLength(255),
                            ])
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Arabic')
                            ->schema([
                                Forms\Components\TextInput::make('mainh1-ar')
                                    ->label('Main Heading 1')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mainh2-ar')
                                    ->label('Main Heading 2')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('subh1-ar')
                                    ->label('Sub Heading 1')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p1-ar')
                                    ->label('Paragraph 1')
                                    ->rows(2)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('subh2-ar')
                                    ->label('Sub Heading 2')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p2-ar')
                                    ->label('Paragraph2')
                                    ->rows(2)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('subh3-ar')
                                    ->label('Sub Heading 3')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p3-ar')
                                    ->label('Paragraph 3')
                                    ->rows(2)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('subh4-ar')
                                    ->label('Sub Heading 4')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p4-ar')
                                    ->label('Paragraph 4')
                                    ->rows(2)
                                    ->autosize()
                                    ->maxLength(255),

                            ])
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('img')
                                    ->image()
                                    ->required()
                                    ->imageEditor()
                                    ->hint("if you want to use the Editor make sure to save first")

                                    ->dehydrateStateUsing(function ($state) {
                                        $files = array_values($state ?? []);
                                        return end($files);
                                    })
                                    ->directory("img"),
                            ])
                    ])->columnSpanFull(),


            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mainh1')
                    ->label('Main heading 1')
                    ->words(5),
                Tables\Columns\TextColumn::make('mainh2')
                    ->label('Main Heading 2')
                    ->words(5),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('img')
                    ->width(100)
                    ->label('Image')
                    ->height(100)
                    ->toggleable(),
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
            'index' => Pages\ListInfos::route('/'),
            // 'create' => Pages\CreateInfo::route('/create'),
            'edit' => Pages\EditInfo::route('/{record}/edit'),
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
