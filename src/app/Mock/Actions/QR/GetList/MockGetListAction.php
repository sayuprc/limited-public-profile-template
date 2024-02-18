<?php

declare(strict_types=1);

namespace App\Mock\Actions\QR\GetList;

use App\Domain\QR\CreatedAt;
use App\Domain\QR\ExpiredAt;
use App\Domain\QR\QR;
use App\Domain\QR\QRCodeId;
use App\Domain\QR\UserId;
use App\UseCases\QR\GetList\GetListInterface;
use App\UseCases\QR\GetList\GetListResponse;

class MockGetListAction implements GetListInterface
{
    /**
     * @inheritDoc
     */
    public function handle(): GetListResponse
    {
        $qrs = [];
        $now = now();

        foreach ([
            ['AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA', $now->parse('2024-01-01 10:00'), $now->parse('2024-01-01 09:00')],
            ['BBBBBBBB-BBBB-BBBB-BBBB-BBBBBBBBBBBB', $now->parse('2024-01-01 11:00'), $now->parse('2024-01-01 10:00')],
            ['CCCCCCCC-CCCC-CCCC-CCCC-CCCCCCCCCCCC', $now->parse('2024-01-01 12:00'), $now->parse('2024-01-01 11:00')],
        ] as [$qrCodeId, $expiredAt, $createdAt]) {
            $qr = new QR(
                new QRCodeId($qrCodeId),
                new UserId('FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF'),
                new ExpiredAt($expiredAt),
                new CreatedAt($createdAt)
            );

            $qrs[] = $qr;
        }

        return new GetListResponse($qrs);
    }
}
