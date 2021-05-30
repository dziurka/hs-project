<?php

namespace Domain\Auth\Actions;

use Domain\Auth\DataTransferObjects\RegisterDTO;
use Domain\Auth\Exceptions\UserEmailAlreadyTaken;
use Domain\Users\Models\User;
use Domain\Users\Repositories\IUserRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class SignUpAction implements ISignUpAction
{
    public function __construct(
        private IUserRepository $userRepository
    ) { }

    public function execute(RegisterDTO $registerDTO): User|Model
    {
        $this->checkEmailExists($registerDTO);
        $user = $this->createUser($registerDTO);

        // todo: send verification mail

        return $user;
    }

    private function createUser(RegisterDTO $registerDTO): User|Model
    {
        return $this->userRepository->create([
            'email' => $registerDTO->email,
            'password' => Hash::make($registerDTO->password),
            'name' => $registerDTO->name
        ]);
    }

    private function checkEmailExists(RegisterDTO $registerDTO): void
    {
        $userExists = $this->userRepository->existsByEmail($registerDTO->email);

        if ($userExists) {
            throw new UserEmailAlreadyTaken();
        }
    }
}
