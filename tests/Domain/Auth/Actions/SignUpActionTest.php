<?php

namespace Tests\Domain\Auth\Actions;

use Domain\Auth\Actions\SignUpAction;
use Domain\Auth\Exceptions\UserEmailAlreadyTaken;
use Domain\Users\Models\User;
use Domain\Users\Repositories\IUserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Prophecy\PhpUnit\ProphecyTrait;
use Tests\Domain\Auth\Factories\RegisterDTOObjectFactory;
use Tests\Domain\User\Factories\UserFactory;
use Tests\TestCase;

class SignUpActionTest extends TestCase
{
    use ProphecyTrait;
    use RefreshDatabase;

    private IUserRepository $userRepository;
    private SignUpAction $signUpAction;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepository = app(IUserRepository::class);

        $this->signUpAction = new SignUpAction(
            $this->userRepository
        );
    }

    public function test_sign_up_user_with_proper_data(): void
    {
        $registerDTO = RegisterDTOObjectFactory::new()->create();
        $user = $this->signUpAction->execute($registerDTO);

        $this->assertInstanceOf(User::class, $user);
        $this->assertDatabaseCount(new User, 1);
        $this->assertDatabaseHas(new User, $user->toArray());
    }

    public function test_sign_up_user_with_taken_email(): void
    {
        $emailAttrs = ['email' => 'someemail@example.com'];
        UserFactory::new($emailAttrs)->create();
        $registerDTO = RegisterDTOObjectFactory::new()->create($emailAttrs);

        $this->expectException(UserEmailAlreadyTaken::class);
        $this->signUpAction->execute($registerDTO);
    }
}
