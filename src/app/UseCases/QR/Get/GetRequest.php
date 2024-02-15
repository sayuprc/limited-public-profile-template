<?php

declare(strict_types=1);

namespace App\UseCases\QR\Get;

readonly class GetRequest
{
    /**
     * @param string $qrCodeId
     * @param string $userId
     *
     * @return void
     */
    public function __construct(public string $qrCodeId, public string $userId)
    {
    }
}
