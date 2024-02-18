<?php

declare(strict_types=1);

namespace App\Http\ViewModel\QR\GetList;

use DateTimeInterface;

readonly class GetListViewModel
{
    /**
     * @param string            $qrCodeId
     * @param DateTimeInterface $expiredAt
     * @param DateTimeInterface $createdAt
     *
     * @return void
     */
    public function __construct(
        public string $qrCodeId,
        private DateTimeInterface $expiredAt,
        private DateTimeInterface $createdAt
    ) {
    }

    /**
     * @return string
     */
    public function expiredAt(): string
    {
        return $this->expiredAt->format('Y-m-d H:i');
    }

    /**
     * @return string
     */
    public function createdAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }
}
