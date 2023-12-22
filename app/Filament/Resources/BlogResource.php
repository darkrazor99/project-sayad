<?php

namespace App\Filament\Resources;

use File;
use Filament\Forms;
use App\Models\Blog;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BlogResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BlogResource\RelationManagers;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                                    ->hint("If you want to use the editor, ensure that you upload the image by saving the information first, rather than doing it on a new entry.")
                                    ->dehydrateStateUsing(function ($state) {
                                        $files = array_values($state ?? []);
                                        // Storage::disk('livewire-tmp')->delete($files[0]);
                                        return end($files);
                                    })

                                    ->directory("img"),
                            ]),

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
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name_ar')
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
