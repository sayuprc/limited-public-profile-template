<?php

declare(strict_types=1);

namespace App\UseCases\QR\Generate;

use DateTimeInterface;

readonly class GenerateRequest
{
    /**
     * @param string            $userId
     * @param DateTimeInterface $expiredAt
     *
     * @return void
     */
    public function __construct(public string $userId, public DateTimeInterface $expiredAt)
    {
    }
}
