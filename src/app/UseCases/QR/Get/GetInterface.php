<?php

declare(strict_types=1);

namespace App\UseCases\QR\Get;

interface GetInterface
{
    /**
     * @param GetRequest $request
     *
     * @return GetResponse
     */
    public function handle(GetRequest $request): GetResponse;
}
