<?php

declare(strict_types=1);

namespace App\Debug\Actions\QR\Edit;

use App\UseCases\QR\Edit\EditInterface;
use App\UseCases\QR\Edit\EditRequest;
use App\UseCases\QR\Edit\EditResponse;

class MockEditAction implements EditInterface
{
    /**
     * @inheritDoc
     */
    public function handle(EditRequest $request): EditResponse
    {
        return new EditResponse($request->qrCodeId);
    }
}
