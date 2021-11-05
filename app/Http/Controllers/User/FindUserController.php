<?php
declare(strict_types=1);

namespace Speeden\Http\Controllers\User;

use Illuminate\Http\JsonResponse;
use Speeden\Http\Controllers\Controller;
use Speeden\Src\BoundedContext\User\Application\Find\FindUserQuery;

final class FindUserController extends Controller
{
    public function __construct(private FindUserQuery $getUserQuery)
    {

    }

    public function __invoke(int $id): JsonResponse
    {
        try {
            $user = $this->getUserQuery->__invoke($id);
        }catch (\Exception $exception)
        {
           return $this->errorResponse($exception->getMessage(),$exception->getCode());
        }

        return $this->successResponse($user->toResponse());




    }
}
