<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Service;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ServiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceResource\RelationManagers;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationGroup = 'Services';
    protected static ?int $navigationSort = 8;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('English')
                            ->schema([
                                Forms\Components\TextInput::make('small')
                                    ->label('Small Heading')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mainh1')
                                    ->label('Main heading')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('s1')
                                    ->label('Service 1')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p1')
                                    ->label('Pharagraph 1')
                                    ->maxLength(255)
                                    ->rows(3)
                                    ->autosize(),
                                Forms\Components\TextInput::make('s2')
                                    ->label('Service 2')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p2')
                                    ->label('Pharagraph 2')

                                    ->rows(3)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('s3')
                                    ->label('Service 3')

                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p3')
                                    ->label('Pharagraph 3')

                                    ->rows(3)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('s4')
                                    ->label('Service 4')

                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p4')
                                    ->label('Pharagraph 4')

                                    ->rows(3)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('s5')
                                    ->label('Service 5')

                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p5')
                                    ->label('Pharagraph 5')

                                    ->rows(3)
                                    ->autosize()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mainphone')
                                    ->label('Main heading Upove Phone')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p6')
                                    ->label('Pharagraph 6')

                                    ->rows(3)
                                    ->autosize()
                                    ->maxLength(255),
                            ])
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Arabic')
                            ->schema([
                                Forms\Components\TextInput::make('small_ar')
                                    ->label('Small Heading')

                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mainh1_ar')
                                    ->label('Main Heading')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('s1_ar')
                                    ->label('Service 1')

                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p1_ar')
                                    ->label('Pharagraph 1')
                                    ->rows(3)
                                    ->autosize()

                                    ->maxLength(255),
                                Forms\Components\TextInput::make('s2_ar')
                                    ->label('Service 2')

                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p2_ar')
                                    ->label('Pharagraph 2')
                                    ->rows(3)
                                    ->autosize()

                                    ->maxLength(255),
                                Forms\Components\TextInput::make('s3_ar')
                                    ->label('Service 3')

                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p3_ar')
                                    ->label('Pharagraph 3')
                                    ->rows(3)
                                    ->autosize()

                                    ->maxLength(255),
                                Forms\Components\TextInput::make('s4_ar')
                                    ->label('Service 4')

                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p4_ar')
                                    ->label('Pharagraph 4')
                                    ->rows(3)
                                    ->autosize()

                                    ->maxLength(255),
                                Forms\Components\TextInput::make('s5_ar')
                                    ->label('Service 5')

                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p5_ar')
                                    ->label('Pharagraph 5')
                                    ->rows(3)
                                    ->autosize()

                                    ->maxLength(255),
                                Forms\Components\TextInput::make('mainphone_ar')
                                    ->label('Main heading Upove Phone')
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('p6_ar')
                                    ->label('Pharagraph 6')
                                    ->maxLength(255)
                                    ->rows(3)
                                    ->autosize(),

                            ])
                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('small')
                    ->label('Main Heading English'),

                Tables\Columns\TextColumn::make('small_ar')
                    ->label('Main Heading Arabic'),

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
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
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
