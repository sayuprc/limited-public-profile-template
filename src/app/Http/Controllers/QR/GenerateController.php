<?php

declare(strict_types=1);

namespace App\Http\Controllers\QR;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

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
}
