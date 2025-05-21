<?php

namespace App\Exceptions;

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
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => 'Erro de validação',
                    'details' => $e->errors(),
                ], 422);
            }
        });
            
    }
}
