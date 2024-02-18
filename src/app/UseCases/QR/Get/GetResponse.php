<?php

declare(strict_types=1);

namespace App\UseCases\QR\Get;

use App\Domain\QR\QR;

readonly class GetResponse
{
    /**
     * @param QR $qr
     *
     * @return void
     */
    public function __construct(public QR $qr)
    {
    }
}
