<?php

namespace App\Filament\Resources\VideosCategoryResource\Pages;

use App\Filament\Resources\VideosCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVideosCategory extends EditRecord
{
    protected static string $resource = VideosCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
