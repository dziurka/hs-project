<?php

namespace App\API\Auth\Controllers;

use App\API\Controller;
use Domain\Auth\Actions\ILogoutUserAction;
use Illuminate\Http\JsonResponse;
use Support\Requests\AuthCheckRequest;

class LogoutController extends Controller
{
    public function __construct(private ILogoutUserAction $logoutUserAction) { }

    public function logout(AuthCheckRequest $request): JsonResponse {
        $this->logoutUserAction->execute();

        return new JsonResponse(status: JsonResponse::HTTP_NO_CONTENT);
    }
}
