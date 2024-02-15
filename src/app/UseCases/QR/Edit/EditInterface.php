<?php

declare(strict_types=1);

namespace App\UseCases\QR\Edit;

interface EditInterface
{
    /**
     * @param EditRequest $request
     *
     * @return EditResponse
     */
    public function handle(EditRequest $request): EditResponse;
}
