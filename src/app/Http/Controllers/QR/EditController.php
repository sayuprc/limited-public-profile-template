<?php

declare(strict_types=1);

namespace App\Http\Controllers\QR;

use App\Http\Controllers\Controller;
use App\Http\Requests\QR\EditRequest;
use App\Http\ViewModel\QR\Edit\EditViewModel;
use App\UseCases\QR\Edit\EditInterface;
use App\UseCases\QR\Edit\EditRequest as QREditRequest;
use App\UseCases\QR\Get\GetInterface;
use App\UseCases\QR\Get\GetRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

    /**
     * @param EditRequest   $request
     * @param EditInterface $handler
     *
     * @return RedirectResponse
     */
    public function handle(EditRequest $request, EditInterface $handler): RedirectResponse
    {
        $qrCodeId = $request->validated('qr_code_id');
        $userId = $request->validated('user_id');
        $expiredAt = now()->parse(implode(' ', $request->validated(['expired_at_date', 'expired_at_time'])));

        $response = $handler->handle(new QREditRequest($qrCodeId, $userId, $expiredAt));

        return redirect()->route('qr.show', ['qr_code_id' => $response->qrCodeId]);
    }
}
