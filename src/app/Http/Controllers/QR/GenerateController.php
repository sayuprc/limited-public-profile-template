<?php

declare(strict_types=1);

namespace App\Http\Controllers\QR;

use App\Http\Controllers\Controller;
use App\Http\Requests\QR\GenerateRequest;
use App\UseCases\QR\Generate\GenerateInterface;
use App\UseCases\QR\Generate\GenerateRequest as QRGenerateRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class GenerateController extends Controller
{
    /**
     * @return View
     */
    public function showForm(): View
    {
        $now = now()->toImmutable();
        $date = $now->format('Y-m-d');
        $time = $now->addHour()->format('H:i');

        return view('qr.generate', compact('date', 'time'));
    }

    /**
     * @param GenerateRequest   $request
     * @param GenerateInterface $handler
     *
     * @return RedirectResponse
     */
    public function handle(GenerateRequest $request, GenerateInterface $handler): RedirectResponse
    {
        $expiredAt = now()->createFromFormat('Y-m-d H:i', implode(' ', $request->validated()));

        $response = $handler->handle(new QRGenerateRequest($request->user()->user_id, $expiredAt));

        return redirect()->route('qr.show', ['qr_code_id' => $response->qrCodeId]);
    }
}
