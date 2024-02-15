<?php

declare(strict_types=1);

namespace App\UseCases\QR\Edit;

use DateTimeInterface;

readonly class EditRequest
{
    /**
     * @param string            $qrCodeId
     * @param string            $userId
     * @param DateTimeInterface $expiredAt
     *
     * @return void
     */
    public function __construct(public string $qrCodeId, public string $userId, public DateTimeInterface $expiredAt)
    {
    }
}
