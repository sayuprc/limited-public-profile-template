<?php

declare(strict_types=1);

namespace App\Mock\Actions\QR\Generate;

use App\UseCases\QR\Generate\GenerateInterface;
use App\UseCases\QR\Generate\GenerateRequest;
use App\UseCases\QR\Generate\GenerateResponse;

class MockGenerateAction implements GenerateInterface
{
    /**
     * @inheritDoc
     */
    public function handle(GenerateRequest $request): GenerateResponse
    {
        return new GenerateResponse('AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA');
    }
}
