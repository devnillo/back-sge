<?php

namespace App\Exceptions;

use App\Helpers\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [];

    protected $dontFlash = ['password', 'password_confirmation'];

    public function register(): void
    {
        $this->renderable(function (ValidationException $e, $request) {
            return ApiResponse::error(
                'Erro de validação',
                422,
                $e->errors()
            );
        });
    }
}
