<?php

declare(strict_types=1);

namespace App\Debug\Actions\Token;

use App\UseCases\Token\VerifyInterface;

class NopVerifyAction implements VerifyInterface
{
    /**
     * @inheritDoc
     */
    public function handle(string $token): bool
    {
        return true;
    }
}
