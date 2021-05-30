<?php

namespace App\API\User\Resources;

use Domain\Users\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource {

    public function toArray($request): array
    {
        /** @var User $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
