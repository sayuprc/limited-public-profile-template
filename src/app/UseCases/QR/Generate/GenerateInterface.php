<?php

declare(strict_types=1);

namespace App\UseCases\QR\Generate;

interface GenerateInterface
{
    /**
     * @param GenerateRequest $request
     *
     * @return GenerateResponse
     */
    public function handle(GenerateRequest $request): GenerateResponse;
}
