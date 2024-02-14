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
        return view('qr.generate');
    }
}
