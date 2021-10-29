<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Application;

use Speeden\Src\BoundedContext\User\Domain\User;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Speeden\Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;

final class GetUserUseCase
{
    public function __construct(protected UserRepositoryContract $repository)
    {

    }

    public function __invoke($id): ?User
    {
        $userID = new UserId($id);

        return $this->repository->find($userID);

    }
}
