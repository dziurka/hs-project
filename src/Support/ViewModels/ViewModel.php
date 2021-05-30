<?php

namespace Support\ViewModels;

use Closure;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;
use Support\Enums\HttpCodeEnum;
use Support\Responses\SuccessResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ViewModel
 * @package Support\ViewModels
 * @see https://github.com/spatie/laravel-view-models
 */
abstract class ViewModel implements Arrayable, Responsable
{
    protected array $ignore = [];
    protected string $view = '';
    protected int $httpCode = Response::HTTP_OK;

    public function toArray(): array
    {
        return $this
            ->items()
            ->all();
    }

    public function toResponse($request): Response
    {
        if ($request->wantsJson()) {
            return new SuccessResponse(payload: $this->items(), status: $this->getHttpCode()->value);
        }

        if ($this->view) {
            return response()->view($this->view, $this);
        }

        return new SuccessResponse(payload: $this->items(), status: $this->getHttpCode()->value);
    }

    public function view(string $view): ViewModel
    {
        $this->view = $view;

        return $this;
    }

    protected function items(): Collection
    {
        $class = new ReflectionClass($this);

        $publicProperties = collect($class->getProperties(ReflectionProperty::IS_PUBLIC))
            ->reject(function (ReflectionProperty $property) {
                return $this->shouldIgnore($property->getName());
            })
            ->mapWithKeys(function (ReflectionProperty $property) {
                return [$property->getName() => $this->{$property->getName()}];
            });

        $publicMethods = collect($class->getMethods(ReflectionMethod::IS_PUBLIC))
            ->reject(function (ReflectionMethod $method) {
                return $this->shouldIgnore($method->getName());
            })
            ->mapWithKeys(function (ReflectionMethod $method) {
                return [$method->getName() => $this->createVariableFromMethod($method)];
            });

        return $publicProperties->merge($publicMethods);
    }

    protected function shouldIgnore(string $methodName): bool
    {
        if (Str::startsWith($methodName, '__')) {
            return true;
        }

        return in_array($methodName, $this->ignoredMethods());
    }

    protected function ignoredMethods(): array
    {
        return array_merge([
            'toArray',
            'toResponse',
            'view',
        ], $this->ignore);
    }

    protected function createVariableFromMethod(ReflectionMethod $method): mixed
    {
        if ($method->getNumberOfParameters() === 0) {
            return $this->{$method->getName()}();
        }

        return Closure::fromCallable([$this, $method->getName()]);
    }

    protected function getHttpCode(): HttpCodeEnum {
        return new HttpCodeEnum($this->httpCode);
    }
}
