<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Infrastructure;


use Speeden\Src\BoundedContext\User\Application\GetUserUseCase;
use Speeden\Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

final class GetUserController
{
    public function __construct(private EloquentUserRepository $repository)
    {

    }

    public function __invoke(int $id)
    {
        $getUserUseCase = new GetUserUseCase($this->repository);

        return $getUserUseCase->__invoke($id);
    }
}
