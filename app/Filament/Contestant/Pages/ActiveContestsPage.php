<?php

// namespace App\Filament\Contestant\Pages;

// use Filament\Pages\Page;

// class ActiveContestsPage extends Page
// {
//     protected static ?string $navigationIcon = 'heroicon-o-document-text';

//     protected static string $view = 'filament.contestant.pages.active-contests-page';
// }


// namespace App\Filament\Pages;
namespace App\Filament\Contestant\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use App\Models\Contest;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;

class ActiveContestsPage extends Page implements HasTable
{
    use InteractsWithTable;

    // protected static string $view = 'filament.pages.active-contests-page';
    protected static string $view = 'filament.contestant.pages.active-contests-page';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Active Contests';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Contest::query()
                    ->whereBetween('start_at', [now()->subDay(), now()->addDays(30)])
            )
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('description')->limit(50),
                TextColumn::make('start_at')->date(),
                TextColumn::make('end_at')->date(),
            ])
            ->filters([
                Tables\Filters\Filter::make('active')
                    ->query(fn (Builder $query) =>
                        $query->where('start_at', '<=', now())
                              ->where('end_at', '>=', now())
                    ),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // You can add custom action like “Participate” here later
            ]);
    }
}
