<?php

declare(strict_types=1);

namespace App\UseCases\Token;

interface VerifyInterface
{
    /**
     * @param string $token
     *
     * @return bool
     */
    public function handle(string $token): bool;
}
