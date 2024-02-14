<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Translation\Translator;

class LoginController extends Controller
{
    /**
     * @param AuthManager $authManager
     * @param Translator  $translator
     *
     * @return void
     */
    public function __construct(private AuthManager $authManager, private Translator $translator)
    {
    }

    /**
     * @return View
     */
    public function showForm(): View
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     *
     * @return RedirectResponse
     */
    public function handle(LoginRequest $request): RedirectResponse
    {
        if ($this->authManager->guard()->attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'message' => $this->translator->get('auth.failed'),
        ]);
    }
}
