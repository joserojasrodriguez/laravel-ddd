<?php
declare(strict_types=1);
namespace Speeden\Src\BoundedContext\Address\Infrastructure;

use Speeden\Src\BoundedContext\Address\Application\GetAddressUseCase;
use Speeden\Src\BoundedContext\Address\Infrastructure\Repositories\EloquentAddressRepository;

final class GetAddressController
{
    public function __construct(private EloquentAddressRepository $repository)
    {

    }

    public function __invoke(int $id)
    {
        $getAddressUseCase = new GetAddressUseCase($this->repository);

        return $getAddressUseCase->__invoke($id);
    }
}
