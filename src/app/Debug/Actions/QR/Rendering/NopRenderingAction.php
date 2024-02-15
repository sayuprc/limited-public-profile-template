<?php

declare(strict_types=1);

namespace App\Debug\Actions\QR\Rendering;

use App\UseCases\QR\Rendering\RenderingInterface;
use App\UseCases\QR\Rendering\RenderingRequest;
use App\UseCases\QR\Rendering\RenderingResponse;
use DateTime;

class NopRenderingAction implements RenderingInterface
{
    /**
     * @inheritDoc
     */
    public function handle(RenderingRequest $request): RenderingResponse
    {
        return new RenderingResponse('data', new DateTime('2024-01-01 10:00'));
    }
}
