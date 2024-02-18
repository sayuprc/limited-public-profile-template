<?php

declare(strict_types=1);

namespace App\Domain\QR;

readonly class QR
{
    /**
     * @param QRCodeId  $qrCodeId
     * @param ExpiredAt $expiredAt
     * @param CreatedAt $createdAt
     *
     * @return void
     */
    public function __construct(
        public QRCodeId $qrCodeId,
        public ExpiredAt $expiredAt,
        public CreatedAt $createdAt
    ) {
    }
}
