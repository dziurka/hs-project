<?php

namespace Domain\Users\Repositories;

use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements IUserRepository
{
    public function create(array $attributes): User|Model
    {
        return User::query()->create($attributes);
    }

    public function existsByEmail(string $email): bool
    {
        return User::query()->where('email', $email)->exists();
    }

    public function findByEmail(string $email): User|Model|null
    {
        return User::query()->where('email', $email)->first();
    }
}
