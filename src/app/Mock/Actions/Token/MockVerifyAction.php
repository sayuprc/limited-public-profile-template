<?php

declare(strict_types=1);

namespace App\Mock\Actions\Token;

use App\UseCases\Token\VerifyInterface;

class MockVerifyAction implements VerifyInterface
{
    /**
     * @inheritDoc
     */
    public function handle(string $token): bool
    {
        return true;
    }
}
