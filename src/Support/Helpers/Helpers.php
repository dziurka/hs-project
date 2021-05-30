<?php

if (!function_exists('spa_url')) {
    function spa_url(string $path = ''): string
    {
        return app(\Support\Services\SpaUrl::class)->getUrl($path);
    }
}

if (!function_exists('faker')) {
    function faker(): \Faker\Generator
    {
        return \Faker\Factory::create();
    }
}
