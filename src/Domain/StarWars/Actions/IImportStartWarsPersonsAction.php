<?php

namespace Domain\StarWars\Actions;

interface IImportStartWarsPersonsAction
{
    public function execute(int $amount = null, $deletePrevious = true): void;
}
