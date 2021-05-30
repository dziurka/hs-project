<?php

namespace App\API\StarWars\Queries;

use Domain\StarWars\Repositories\IPersonRepository;
use Spatie\QueryBuilder\QueryBuilder;

class PersonIndexQueryFactory
{
    public function __construct(
        private IPersonRepository $personRepository
    )
    {
        //
    }

    public function make(): QueryBuilder
    {
        $personQuery = $this->personRepository->queryIndex();

        return QueryBuilder::for($personQuery)
            ->allowedFilters(['gender', 'name'])
            ->allowedSorts(['gender', 'name']);
    }
}
