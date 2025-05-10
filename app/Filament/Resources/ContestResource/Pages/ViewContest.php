<?php

namespace App\Filament\Resources\ContestResource\Pages;

use App\Filament\Resources\ContestResource;
use Filament\Resources\Pages\Page;

class ViewContest extends Page
{
    protected static string $resource = ContestResource::class;

    protected static string $view = 'filament.resources.contest-resource.pages.view-contest';

    public function infolist(Infolist $list): Infolist
    
    {
        return $list
            ->schema([
                Card::make()->schema([
                    TextColumn::make('name'),
                    TextColumn::make('description'),
                    DateTimeColumn::make('start_date'),
                    DateTimeColumn::make('end_date'),
                ]),
            ]);
    }
}
