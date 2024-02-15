<?php

declare(strict_types=1);

namespace App\UseCases\QR\Generate;

readonly class GenerateResponse
{
    /**
     * @param string $qrCodeId
     *
     * @return void
     */
    public function __construct(public string $qrCodeId)
    {
    }
}
