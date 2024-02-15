<?php

declare(strict_types=1);

namespace App\Debug\Actions\QR\GetList;

use App\Models\QR;
use App\UseCases\QR\GetList\GetListInterface;
use App\UseCases\QR\GetList\GetListResponse;
use DateTime;

class MockGetListAction implements GetListInterface
{
    /**
     * @inheritDoc
     */
    public function handle(): GetListResponse
    {
        $qrs = [];

        foreach ([
            ['AAAAAAAA-AAAA-AAAA-AAAA-AAAAAAAAAAAA', new DateTime('2024-01-01 10:00'), new DateTime('2024-01-01 09:00')],
            ['BBBBBBBB-BBBB-BBBB-BBBB-BBBBBBBBBBBB', new DateTime('2024-01-01 10:00'), new DateTime('2024-01-01 09:00')],
            ['CCCCCCCC-CCCC-CCCC-CCCC-CCCCCCCCCCCC', new DateTime('2024-01-01 10:00'), new DateTime('2024-01-01 09:00')],
        ] as [$qrCodeId, $expiredAt, $createdAt]) {
            $qr = new QR();
            $qr->qr_code_id = $qrCodeId;
            $qr->expired_at = $expiredAt;
            $qr->created_at = $createdAt;

            $qrs[] = $qr;
        }

        return new GetListResponse($qrs);
    }
}
