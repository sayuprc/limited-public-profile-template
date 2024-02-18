<?php

declare(strict_types=1);

namespace App\Debug\Actions\QR\Get;

use App\Domain\QR\CreatedAt;
use App\Domain\QR\ExpiredAt;
use App\Domain\QR\QR;
use App\Domain\QR\QRCodeId;
use App\Domain\QR\UserId;
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
        $now = now();
        $qr = new QR(
            new QRCodeId($request->qrCodeId),
            new UserId('FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF'),
            new ExpiredAt($now->parse('2024-01-01 10:00')),
            new CreatedAt($now->parse('2024-01-01 09:00'))
        );

        return new GetResponse($qr);
    }
}
