<?php

namespace App\API\StarWars\Controllers;

use App\API\Controller;
use App\API\StarWars\Queries\PersonIndexQueryFactory;
use App\API\StarWars\ViewModels\PersonViewModel;

class PersonController extends Controller
{
    public function index(
        PersonIndexQueryFactory $indexQueryFactory
    ): PersonViewModel
    {
        return new PersonViewModel($indexQueryFactory->make());
    }
}
