<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\UseCases\Token\VerifyInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyToken
{
    /**
     * @param VerifyInterface $handler
     *
     * @return void
     */
    public function __construct(private VerifyInterface $handler)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Request                                                                         $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->input('token') ?? $request->session()->get('token') ?? '';

        if (! $this->handler->handle($token)) {
            return abort(403);
        }

        $request->session()->put('token', $token);

        return $next($request);
    }
}
