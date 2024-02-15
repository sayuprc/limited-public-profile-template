<?php

declare(strict_types=1);

namespace App\Debug\Actions\QR\Get;

use App\Models\QR;
use App\UseCases\QR\Get\GetInterface;
use App\UseCases\QR\Get\GetRequest;
use App\UseCases\QR\Get\GetResponse;

class MockGetAction implements GetInterface
{
    /**
     * @inheritDoc
     */
    public function handle(GetRequest $request): GetResponse
    {
        $qr = new QR();
        $qr->qr_code_id = $request->qrCodeId;
        $qr->user_id = $request->userId;
        $qr->token = 'token';
        $qr->hash = 'hash';
        $now = now();
        $qr->expired_at = $now->parse('2024-01-01 10:00');
        $qr->created_at = $now->parse('2024-01-01 09:00');
        $qr->updated_at = $now->parse('2024-01-01 09:00');

        return new GetResponse($qr);
    }
}
