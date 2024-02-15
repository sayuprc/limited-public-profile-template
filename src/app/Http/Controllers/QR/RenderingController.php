<?php

declare(strict_types=1);

namespace App\Http\Controllers\QR;

use App\Http\Controllers\Controller;
use App\UseCases\QR\Rendering\RenderingInterface;
use App\UseCases\QR\Rendering\RenderingRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RenderingController extends Controller
{
    /**
     * @param Request            $request
     * @param string             $qrCodeId
     * @param RenderingInterface $handler
     *
     * @return View
     */
    public function handle(Request $request, string $qrCodeId, RenderingInterface $handler): View
    {
        $response = $handler->handle(new RenderingRequest($request->user()->user_id, $qrCodeId));

        return view('qr.show', [
            'qrCodeId' => $qrCodeId,
            'expiredAt' => $response->expiredAt->format('Y-m-d H:i'),
            'data' => $response->data,
        ]);
    }
}
