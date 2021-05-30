<?php

namespace Domain\StarWars\Repositories\Swapi;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\LazyCollection;

class SwapiRepository implements ISwapiRepository
{
    private const SWAPI_URL = 'https://swapi.dev/api/';
    private const SWAPI_ITEM_LIMIT = 10;

    public function getItems(string $resourceName): LazyCollection
    {
        return LazyCollection::make(function () use ($resourceName) {
            $nextPage = 1;
            $lastPage = 1;

            while ($nextPage <= $lastPage) {
                $result = $this->getNextPage($resourceName, $nextPage);
                $nextPage++;
                $lastPage = (int)ceil($result->count / self::SWAPI_ITEM_LIMIT);

                yield from $result->results;
            }
        });
    }

    private function getHttpClient(): PendingRequest
    {
        return Http::timeout(120);
    }

    private function getNextPage(string $resourceName, int $page = 1): object
    {
        return $this->getHttpClient()->get(
            $this->getResourceEndpoint($resourceName), [
            'page' => $page
        ])->object();
    }

    private function getResourceEndpoint(string $resourceName): string
    {
        return self::SWAPI_URL . $resourceName;
    }
}
