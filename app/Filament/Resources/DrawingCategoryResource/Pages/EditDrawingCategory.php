<?php

namespace App\Filament\Resources\DrawingCategoryResource\Pages;

use App\Filament\Resources\DrawingCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDrawingCategory extends EditRecord
{
    protected static string $resource = DrawingCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
