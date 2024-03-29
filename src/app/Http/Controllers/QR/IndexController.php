<?php

declare(strict_types=1);

namespace App\Http\Controllers\QR;

use App\Domain\QR\QR;
use App\Http\Controllers\Controller;
use App\Http\ViewModel\QR\GetList\GetListViewModel;
use App\UseCases\QR\GetList\GetListInterface;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    /**
     * @param GetListInterface $handler
     *
     * @return View
     */
    public function handle(GetListInterface $handler): View
    {
        $response = $handler->handle();

        $viewModels = array_map(
            fn (QR $qr): GetListViewModel => new GetListViewModel(
                $qr->qrCodeId->value,
                $qr->expiredAt->value,
                $qr->createdAt->value
            ),
            $response->qrs
        );

        return view('qr.index', ['qrs' => $viewModels]);
    }
}
