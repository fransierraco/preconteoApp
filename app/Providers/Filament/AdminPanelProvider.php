<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->spa()
            //->topNavigation()
            // ->unsavedChangesAlerts()
            ->font('Poppins')
            ->colors([
                'primary' => Color::Emerald,
            ])


            //  ->colors([
            //     'primary' => [
            //         50 => 'oklch(0.969 0.015 12.422)',
            //         100 => 'oklch(0.941 0.03 12.58)',
            //         200 => 'oklch(0.892 0.058 10.001)',
            //         300 => 'oklch(0.81 0.117 11.638)',
            //         400 => 'oklch(0.712 0.194 13.428)',
            //         500 => 'oklch(0.645 0.246 16.439)',
            //         600 => 'oklch(0.586 0.253 17.585)',
            //         700 => 'oklch(0.514 0.222 16.935)',
            //         800 => 'oklch(0.455 0.188 13.697)',
            //         900 => 'oklch(0.41 0.159 10.272)',
            //         950 => 'oklch(0.271 0.105 12.094)',
            //     ]
            // ])

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
