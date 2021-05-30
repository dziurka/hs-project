<?php

namespace Domain\Users\Repositories;

use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Model;

interface IUserRepository {

    public function create(array $attributes): User|Model;

    public function existsByEmail(string $email): bool;

    public function findByEmail(string $email): User|Model|null;
}
