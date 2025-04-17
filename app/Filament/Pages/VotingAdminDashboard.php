<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class VotingAdminDashboard extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    // Set the custom navigation label here.
    protected static ?string $navigationLabel = ' Dashboard ';

    // Set the view for this page.
    protected static string $view = 'filament.pages.voting-admin-dashboard';

    // Override to remove the header completely.
    public function getHeading(): string
    {
        return '';
    }
}
