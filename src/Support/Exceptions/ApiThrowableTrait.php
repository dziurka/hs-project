<?php

namespace Support\Exceptions;

use Illuminate\Support\Str;
use JetBrains\PhpStorm\Pure;
use Support\Enums\HttpCodeEnum;
use Support\Responses\ErrorResponse;
use Support\Responses\Response;

trait ApiThrowableTrait {

    private string $generalExceptionSuffix = 'Exception';

    protected ?string $title = null;
    protected mixed $payload = null;
    protected int $statusCode = Response::HTTP_BAD_REQUEST;

    private mixed $dynamicPayload;

    public function render(): ErrorResponse
    {
        return new ErrorResponse($this->title(), $this->payload(), $this->httpCode()->value);
    }

    protected function title(): string
    {
        if ($this->title !== null) {
            return $this->title;
        }

        return Str::of(class_basename($this))
            ->replace($this->generalExceptionSuffix, '')
            ->snake(' ')->title();
    }

    protected function payload(): mixed {
        return $this->dynamicPayload ?? $this->payload;
    }

    #[Pure]
    protected function httpCode(): HttpCodeEnum
    {
        return HttpCodeEnum::from($this->statusCode);
    }
}
