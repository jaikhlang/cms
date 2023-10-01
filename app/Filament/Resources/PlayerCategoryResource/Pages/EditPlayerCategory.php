<?php

namespace App\Filament\Resources\PlayerCategoryResource\Pages;

use App\Filament\Resources\PlayerCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayerCategory extends EditRecord
{
    protected static string $resource = PlayerCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
