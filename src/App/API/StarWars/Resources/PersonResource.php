<?php

namespace App\API\StarWars\Resources;

use Domain\StarWars\Models\Person;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource {

    public function toArray($request): array
    {
        /** @var Person $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'height' => $this->height,
            'mass' => $this->mass,
            'hair_color' => $this->hair_color,
            'skin_color' => $this->skin_color,
            'eye_color' => $this->eye_color,
            'birth_year' => $this->birth_year,
            'gender' => $this->gender,
            'films' => FilmResource::collection($this->films)
        ];
    }
}
