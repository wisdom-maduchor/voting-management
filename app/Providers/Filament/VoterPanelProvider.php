<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
// use Filament\Http\Middleware\RequirePassword;

class VoterPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('voter')
            ->path('voter')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Voter/Resources'), for: 'App\\Filament\\Voter\\Resources')
            ->discoverPages(in: app_path('Filament/Voter/Pages'), for: 'App\\Filament\\Voter\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Voter/Widgets'), for: 'App\\Filament\\Voter\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,

                // Authenticate::class,
                // RequirePassword::class,
            ])
            // ->authMiddleware([
            //     Authenticate::class,
            // ])

            // login for user
            // ->authGuard('web')
            ->authMiddleware([
                \Illuminate\Auth\Middleware\Authenticate::class,
            ]);
            // ->loginRedirect(fn () => to_route('filament.voter.pages.dashboard'))
            // ->auth(fn () => auth()->check() && auth()->user()->role === 'voter');

    }
}
