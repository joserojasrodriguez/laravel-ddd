<?php
declare(strict_types=1);
namespace Speeden\Src\BoundedContext\User\Application\Find;

use Speeden\Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

final class FindUserQuery
{
    public function __construct(private EloquentUserRepository $repository)
    {

    }

    public function __invoke(int $id)
    {
        $getUserUseCase = new FindUser($this->repository);

        return $getUserUseCase->searchById($id);
    }
}
