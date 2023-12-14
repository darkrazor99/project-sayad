<?php

namespace App\Filament\Resources\PdfCategoryResource\Pages;

use App\Filament\Resources\PdfCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePdfCategory extends CreateRecord
{
    protected static string $resource = PdfCategoryResource::class;
}
