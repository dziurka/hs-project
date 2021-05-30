<?php

namespace Domain\StarWars\Repositories\Swapi;

use Illuminate\Support\LazyCollection;

class SwapiFilmRepository implements ISwapiFilmRepository
{
    private const SWAPI_RESOURCE_NAME = 'films';

    public function __construct(
        private ISwapiRepository $swapiRepository
    ) { }

    public function getFilms(): LazyCollection
    {
        return $this->swapiRepository->getItems(self::SWAPI_RESOURCE_NAME);
    }
}
