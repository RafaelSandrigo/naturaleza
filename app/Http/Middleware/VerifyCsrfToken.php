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
        'produtos/*',
        'produtos',
        '/api/categorias/*',
        '/api/categorias',
        '/api/cabecalhos/*',
        '/api/cabecalhos',
        '/api/produtos/*',
        '/api/fechamentos/*',
        '/api/fechamentos',
        '/api/alertas',
        '/api/alertas/*',
        '/cabecalhos/*',
        '/api/*',
    ];
}
