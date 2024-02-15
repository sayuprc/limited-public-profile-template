<?php

declare(strict_types=1);

namespace App\Debug\Actions\QR\GetList;

use App\Models\QR;
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
            $qr = new QR();
            $qr->qr_code_id = $qrCodeId;
            $qr->expired_at = $expiredAt;
            $qr->created_at = $createdAt;

            $qrs[] = $qr;
        }

        return new GetListResponse($qrs);
    }
}
