<?php

declare(strict_types=1);

namespace App\Domain\QR;

readonly class UserId
{
    /**
     * @param string $value
     *
     * @return void
     */
    public function __construct(public string $value)
    {
    }
}
