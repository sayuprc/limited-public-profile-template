<?php

declare(strict_types=1);

namespace App\Http\ViewModel\QR\Edit;

use DateTimeInterface;

readonly class EditViewModel
{
    /**
     * @param string            $qrCodeId
     * @param DateTimeInterface $expiredAt
     *
     * @return void
     */
    public function __construct(
        public string $qrCodeId,
        private DateTimeInterface $expiredAt,
    ) {
    }

    /**
     * @return string
     */
    public function expiredAtDate(): string
    {
        return $this->expiredAt->format('Y-m-d');
    }

    /**
     * @return string
     */
    public function expiredAtTime(): string
    {
        return $this->expiredAt->format('H:i');
    }
}
