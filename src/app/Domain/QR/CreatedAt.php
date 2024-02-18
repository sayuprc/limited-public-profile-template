<?php

declare(strict_types=1);

namespace App\Domain\QR;

use DateTimeInterface;

readonly class CreatedAt
{
    /**
     * @param DateTimeInterface $value
     *
     * @return void
     */
    public function __construct(public DateTimeInterface $value)
    {
    }
}
