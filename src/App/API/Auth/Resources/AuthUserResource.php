<?php

namespace App\API\Auth\Resources;

use Domain\Users\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserResource extends JsonResource {

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
