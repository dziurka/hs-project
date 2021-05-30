<?php

namespace Support\Traits;

use Illuminate\Support\Str;

trait HasUuidKey
{
    protected static function bootHasUuidKey()
    {
        static::creating(function ($model) {
            if (!empty($model->{$model->getKeyName()})) {
                return;
            }

            $model->{$model->getKeyName()} = Str::orderedUuid()->toString();
        });
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }
}
