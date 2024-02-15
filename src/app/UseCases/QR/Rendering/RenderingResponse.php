<?php

declare(strict_types=1);

namespace App\UseCases\QR\Rendering;

use DateTimeInterface;

readonly class RenderingResponse
{
    /**
     * @param string            $data
     * @param DateTimeInterface $expiredAt
     *
     * @return void
     */
    public function __construct(public string $data, public DateTimeInterface $expiredAt)
    {
    }
}
