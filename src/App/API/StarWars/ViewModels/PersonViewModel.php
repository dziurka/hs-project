<?php

namespace App\API\StarWars\ViewModels;

use App\API\StarWars\Resources\PersonResource;
use Spatie\QueryBuilder\QueryBuilder;
use Support\ViewModels\ViewModel;

class PersonViewModel extends ViewModel
{
    public function __construct(
        private QueryBuilder $persons
    )
    {
        //
    }

    public function people()
    {
        return PersonResource::collection(
            $this->persons->paginate()
        )->response()->getData(assoc: true);
    }
}
