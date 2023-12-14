<?php

namespace App\Filament\Resources\BasicArticalResource\Pages;

use App\Filament\Resources\BasicArticalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBasicArticals extends ListRecords
{
    protected static string $resource = BasicArticalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('فصل جديد'),
        ];
    }
}
