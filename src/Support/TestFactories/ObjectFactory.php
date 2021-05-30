<?php

namespace Support\TestFactories;

/**
 * Class ObjectFactory
 * @package Support\TestFactories
 * @see https://stitcher.io/blog/laravel-beyond-crud-09-test-factories
 */
abstract class ObjectFactory
{
    abstract public function create(array $parameters = []);

    /**
     * @return static
     */
    public static function new(): self
    {
        return new static();
    }

    /**
     * @param int $times
     * @return ObjectFactoryCollection
     */
    public static function times(int $times): ObjectFactoryCollection
    {
        return new ObjectFactoryCollection(static::class, $times);
    }
}
