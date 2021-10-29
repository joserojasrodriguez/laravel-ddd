<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\Address\Infrastructure;

use Speeden\Src\BoundedContext\Address\Application\StoreAddressUseCase;
use Speeden\Src\BoundedContext\Address\Infrastructure\Repositories\EloquentAddressRepository;


final class StoreAddressController
{
    public function __construct(protected EloquentAddressRepository $repository)
    {

    }

    public function __invoke(array $data)
    {
        $storeAddressUseCase = new StoreAddressUseCase($this->repository);

        return $storeAddressUseCase->__invoke($data);

    }
}
