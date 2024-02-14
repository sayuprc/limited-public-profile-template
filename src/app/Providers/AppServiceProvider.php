<?php

declare(strict_types=1);

namespace App\Providers;

use App\Debug\Actions\QR\Generate\NopGenerateAction;
use App\UseCases\QR\Generate\GenerateInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind(GenerateInterface::class, NopGenerateAction::class);
    }
}
