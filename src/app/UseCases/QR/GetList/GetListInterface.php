<?php

declare(strict_types=1);

namespace App\UseCases\QR\GetList;

interface GetListInterface
{
    /**
     * @return GetListResponse
     */
    public function handle(): GetListResponse;
}
