<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    // public function register()
    // {
    //     $this->renderable(function (NotFoundHttpException $e, $request) {
    //         return response()->json([
    //             'error' => 'Página não encontrada'
    //         ], 404);
    //     });
    // }
    public function render($request, Throwable $exception)
    {
        $requesURI = $request->getRequestUri();
        
        // Se a exceção for um erro 401 (não autorizado)
        switch (get_class($exception)) {
            case "Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException":
                return response()->view('errors.401', ['title' => 'Não Autorizado'], 401);

            case "Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException":
                return response()->view('errors.403', ['title' => 'Acesso Negado'], 403);

            case "Symfony\Component\HttpKernel\Exception\NotFoundHttpException":
                if (str_contains($requesURI, "/api")) {
                    return response()->json(["message" => 'Not Found'], 404);
                }
                return response()->view('errors.404', ['title' => 'Página Não Encontrada'], 404);

            case "Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException":
                return response()->json(["message" => "Metodo não suportado"], 405);

            case "Illuminate\Session\TokenMismatchException":
                return response()->view('errors.419', ['title' => 'Sessão Expirada'], 419);

            case "Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException":
                return response()->view('errors.429', ['title' => 'Muitas Requisições'], 429);

            case "Symfony\Component\HttpKernel\Exception\HttpException":
                return response()->view('errors.500', ['title' => 'Erro Interno'], 500);

            case "Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException":
                return response()->view('errors.503', ['title' => 'Serviço Indisponível'], 503);

            case "Illuminate\Database\Eloquent\ModelNotFoundException":
                return response()->view('errors.404', ['title' => 'Página Não Encontrada'], 404);

            default:
                // Se a exceção não for reconhecida, você pode retornar um erro genérico ou re-lançar a exceção
                throw $exception;
        }


        // Para outros tipos de exceção, é lançado um erro padrão
        return response()->view('errors.generico', ['title' => 'Acesso negado'], 403);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    // public function register()
    // {
    //     $this->reportable(function (Throwable $e) {
    //         //
    //     });
    // }
}
