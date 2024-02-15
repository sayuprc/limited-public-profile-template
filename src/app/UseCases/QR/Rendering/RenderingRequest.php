<?php

declare(strict_types=1);

namespace App\UseCases\QR\Rendering;

readonly class RenderingRequest
{
    /**
     * @param string $userId
     * @param string $qrCodeId
     *
     * @return void
     */
    public function __construct(public string $userId, public string $qrCodeId)
    {
    }
}
