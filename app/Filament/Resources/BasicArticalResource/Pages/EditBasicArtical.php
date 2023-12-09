<?php

namespace App\Filament\Resources\BasicArticalResource\Pages;

use App\Filament\Resources\BasicArticalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBasicArtical extends EditRecord
{
    protected static string $resource = BasicArticalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
