<?php

declare(strict_types=1);

namespace App\Http\ViewModel\QR\Edit;

use App\Domain\QR\ExpiredAt;
use App\Domain\QR\QRCodeId;
use App\Domain\QR\UserId;

readonly class EditViewModel
{
    /**
     * @param QRCodeId  $qrCodeId
     * @param UserId    $userId
     * @param ExpiredAt $expiredAt
     *
     * @return void
     */
    public function __construct(
        public QRCodeId $qrCodeId,
        public UserId $userId,
        private ExpiredAt $expiredAt,
    ) {
    }

    /**
     * @return string
     */
    public function expiredAtDate(): string
    {
        return $this->expiredAt->value->format('Y-m-d');
    }

    /**
     * @return string
     */
    public function expiredAtTime(): string
    {
        return $this->expiredAt->value->format('H:i');
    }
}
