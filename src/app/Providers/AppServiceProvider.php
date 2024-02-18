<?php

declare(strict_types=1);

namespace App\Providers;

use App\Mock\Actions\QR\Edit\MockEditAction;
use App\Mock\Actions\QR\Generate\MockGenerateAction;
use App\Mock\Actions\QR\Get\MockGetAction;
use App\Mock\Actions\QR\GetList\MockGetListAction;
use App\Mock\Actions\QR\Rendering\MockRenderingAction;
use App\Mock\Actions\Token\MockVerifyAction;
use App\UseCases\QR\Edit\EditInterface;
use App\UseCases\QR\Generate\GenerateInterface;
use App\UseCases\QR\Get\GetInterface;
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
        $this->app->bind(GetInterface::class, MockGetAction::class);
        $this->app->bind(GenerateInterface::class, MockGenerateAction::class);
        $this->app->bind(RenderingInterface::class, MockRenderingAction::class);
        $this->app->bind(EditInterface::class, MockEditAction::class);
        $this->app->bind(VerifyInterface::class, MockVerifyAction::class);
    }
}
