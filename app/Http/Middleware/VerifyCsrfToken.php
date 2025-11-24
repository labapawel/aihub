<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/api/*',
        '/payment/callback',
        '/gemini/*',  // wyłącza wszystkie route zaczynające się od /gemini/
        '/ai/*',  // wyłącza wszystkie route zaczynające się od /ai/
    ];
}