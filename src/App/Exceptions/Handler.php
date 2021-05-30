<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Support\Enums\EnvEnum;
use Support\Enums\HttpCodeEnum;
use Support\Exceptions\ApiException;
use Support\Exceptions\HttpApiException;
use Support\Responses\ErrorResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render(
        $request, Throwable $exception
    ): Response|ErrorResponse|JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        if ($exception instanceof ValidationException) {
            return new ErrorResponse(
                message: $exception->getMessage(),
                payload: $exception->errors(),
                status: HttpCodeEnum::HTTP_UNPROCESSABLE_ENTITY()->value
            );
        }

        if ($exception instanceof AuthenticationException || $exception instanceof AuthorizationException) {
            return new ErrorResponse(
                message: $exception->getMessage(),
                status: HttpCodeEnum::HTTP_UNAUTHORIZED()->value
            );
        }

        if ($exception instanceof HttpApiException || $exception instanceof ApiException) {
            return parent::render($request, $exception);
        }

        if ($exception instanceof HttpException) {
            return new ErrorResponse(
                message: $exception->getMessage() ?: Str::of(class_basename($exception))
                    ->replace('Exception', '')
                    ->replace('Http', '')
                    ->snake(' ')->title(),
                status: $exception->getStatusCode()
            );
        }

        return new ErrorResponse(
            message: Str::of(class_basename($exception))->snake(' ')->title(),
            payload: app()->environment(EnvEnum::local()->value) ? $this->convertExceptionToArray($exception) : null,
            status: HttpCodeEnum::HTTP_BAD_REQUEST()->value
        );
    }
}
