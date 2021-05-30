<?php

namespace App\Console\Commands\StarWars;

use Domain\StarWars\Actions\IImportStartWarsPersonsAction;
use Illuminate\Console\Command;

class ImportStartWarsPersonsCommand extends Command
{
    protected $signature = 'hs:import {amount=50}';

    protected $description = 'Import people and films from swapi.dev';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(IImportStartWarsPersonsAction $importStartWarsPersonsAction): void
    {
        $amount = (int)$this->ask('How many people do you import?', 50);
        $deletePrevious = $this->ask('Do you want to delete previously imported records? [y/n]', 'y');

        $importStartWarsPersonsAction->execute(
            $amount,
            $deletePrevious === 'y'
        );
    }
}
