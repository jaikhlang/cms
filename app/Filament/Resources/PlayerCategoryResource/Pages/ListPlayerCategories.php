<?php

namespace App\Filament\Resources\PlayerCategoryResource\Pages;

use App\Filament\Resources\PlayerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayerCategories extends ListRecords
{
    protected static string $resource = PlayerCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
