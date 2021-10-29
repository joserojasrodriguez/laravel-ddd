<?php
declare(strict_types=1);

namespace Speeden\Http\Controllers\User;

use Illuminate\Http\JsonResponse;
use Speeden\Http\Controllers\Controller;
use Speeden\Src\BoundedContext\User\Infrastructure\GetUserController as GetUser;

final class GetUserController extends Controller
{
    public function __construct(private GetUser $getUserController)
    {

    }

    public function __invoke(int $id): JsonResponse
    {
        $user = $this->getUserController->__invoke($id);

        return is_null($user)
            ? response()->json([
                'data'    => [],
                'error'   => 'Model not found',
                'success' => false
            ], 404)
            : response()->json([
                'data'    => [
                    'name'              => $user->name(),
                    'email'             => $user->email(),
                    'email_verified_at' => $user->emailVerifiedDate(),
                    'remember_token'    => $user->rememberToken(),
                    'addresses'         => [
                        'count' => $user->addresses()->count(),
                        'data'  => $user->addresses()->getItems()
                    ],
                ],
                'errors'  => [],
                'success' => true
            ], 200);

    }
}
