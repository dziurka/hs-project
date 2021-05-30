<?php

namespace App\API\StarWars\Resources;

use Domain\StarWars\Models\Film;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource {

    public function toArray($request): array
    {
        /** @var Film $this */
        return [
            'id' => $this->id,
            'title' => $this->title,
            'episode_id' => $this->episode_id,
            'director' => $this->director,
            'producer' => $this->producer,
        ];
    }
}
