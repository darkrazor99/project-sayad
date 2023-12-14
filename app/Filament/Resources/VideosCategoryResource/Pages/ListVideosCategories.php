<?php

namespace App\Filament\Resources\VideosCategoryResource\Pages;

use App\Filament\Resources\VideosCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVideosCategories extends ListRecords
{
    protected static string $resource = VideosCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
