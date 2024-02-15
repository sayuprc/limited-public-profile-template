<?php

declare(strict_types=1);

namespace App\UseCases\QR\Rendering;

interface RenderingInterface
{
    /**
     * @param RenderingRequest $request
     *
     * @return RenderingResponse
     */
    public function handle(RenderingRequest $request): RenderingResponse;
}
