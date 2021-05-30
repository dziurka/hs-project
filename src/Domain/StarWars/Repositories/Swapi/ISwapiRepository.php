<?php

namespace Domain\StarWars\Repositories\Swapi;

use Illuminate\Support\LazyCollection;

interface ISwapiRepository
{
    public function getItems(string $resourceName): LazyCollection;
}
