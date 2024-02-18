<?php

declare(strict_types=1);

namespace App\Http\ViewModel\QR\GetList;

use App\Domain\QR\CreatedAt;
use App\Domain\QR\ExpiredAt;
use App\Domain\QR\QRCodeId;

readonly class GetListViewModel
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
        private ExpiredAt $expiredAt,
        private CreatedAt $createdAt
    ) {
    }

    /**
     * @return string
     */
    public function expiredAt(): string
    {
        return $this->expiredAt->value->format('Y-m-d H:i');
    }

    /**
     * @return string
     */
    public function createdAt(): string
    {
        return $this->createdAt->value->format('Y-m-d H:i:s');
    }
}
