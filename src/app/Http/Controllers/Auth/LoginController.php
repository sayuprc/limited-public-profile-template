<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function showForm(): View
    {
        return view('auth.login');
    }
}
