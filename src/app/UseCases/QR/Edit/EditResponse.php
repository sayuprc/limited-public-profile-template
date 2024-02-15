<?php

declare(strict_types=1);

namespace App\UseCases\QR\Edit;

readonly class EditResponse
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
