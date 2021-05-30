<?php

namespace Domain\StarWars\Repositories\Swapi;

use Illuminate\Support\LazyCollection;

class SwapiPersonRepository implements ISwapiPersonRepository
{
    private const SWAPI_RESOURCE_NAME = 'people';

    public function __construct(
        private ISwapiRepository $swapiRepository
    ) { }

    public function getPersons(): LazyCollection
    {
        return $this->swapiRepository->getItems(self::SWAPI_RESOURCE_NAME);
    }
}
