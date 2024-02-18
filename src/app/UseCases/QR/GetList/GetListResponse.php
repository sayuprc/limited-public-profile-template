<?php

declare(strict_types=1);

namespace App\UseCases\QR\GetList;

use App\Domain\QR\QR;

readonly class GetListResponse
{
    /**
     * @param array<QR> $qrs
     *
     * @return void
     */
    public function __construct(public array $qrs)
    {
    }
}
