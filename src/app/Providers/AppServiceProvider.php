<?php

declare(strict_types=1);

namespace App\Providers;

use App\Debug\Actions\QR\Generate\NopGenerateAction;
use App\Debug\Actions\QR\GetList\MockGetListAction;
use App\Debug\Actions\QR\Rendering\NopRenderingAction;
use App\Debug\Actions\Token\NopVerifyAction;
use App\UseCases\QR\Generate\GenerateInterface;
use App\UseCases\QR\GetList\GetListInterface;
use App\UseCases\QR\Rendering\RenderingInterface;
use App\UseCases\Token\VerifyInterface;
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
        $this->app->bind(GetListInterface::class, MockGetListAction::class);
        $this->app->bind(GenerateInterface::class, NopGenerateAction::class);
        $this->app->bind(RenderingInterface::class, NopRenderingAction::class);
        $this->app->bind(VerifyInterface::class, NopVerifyAction::class);
    }
}
