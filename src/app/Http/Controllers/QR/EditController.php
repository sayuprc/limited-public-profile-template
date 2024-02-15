<?php

declare(strict_types=1);

namespace App\Http\Controllers\QR;

use App\Http\Controllers\Controller;
use App\Http\ViewModel\QR\Edit\EditViewModel;
use App\UseCases\QR\Get\GetInterface;
use App\UseCases\QR\Get\GetRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * @param Request      $request
     * @param string       $qrCodeId
     * @param GetInterface $handler
     *
     * @return View
     */
    public function showForm(Request $request, string $qrCodeId, GetInterface $handler): View
    {
        $response = $handler->handle(new GetRequest($qrCodeId, $userId = $request->user()->user_id));

        $qr = new EditViewModel($response->qr->qr_code_id, $userId, $response->qr->expired_at);

        return view('qr.edit', compact('qr'));
    }
}
