<?php

namespace Support\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Support\Exceptions\IncorrectSpaUrlException;

class SpaUrl
{
    private ?string $url = null;

    public function __construct()
    {
        if ($this->url() === Config::get('app.url')) {
            throw new IncorrectSpaUrlException();
        }
    }

    public function getUrl(string $path = ''): string
    {
        if ($path !== '') {
            return $this->url() . (Str::startsWith($path, '/') ? $path : '/' . $path);
        }

        return $this->url();
    }

    public function getHostAndPort(): string
    {
        $spaPort = parse_url($this->url(), PHP_URL_PORT);
        return parse_url($this->url(), PHP_URL_HOST) . ($spaPort ? ':' . $spaPort : '');
    }

    public function getScheme(): string
    {
        return parse_url($this->url(), PHP_URL_SCHEME);
    }

    private function url(): string
    {
        if ($this->url !== null) {
            return $this->url;
        }

        return $this->url = Config::get('app.spa_url', 'localhost');
    }
}
