<?php
declare(strict_types=1);
namespace Speeden\Src\BoundedContext\Address\Application;

use Speeden\Src\BoundedContext\Address\Domain\Address;
use Speeden\Src\BoundedContext\Address\Domain\Contracts\AddressRepositoryContract;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressId;

final class GetAddressUseCase
{
    public function __construct(protected AddressRepositoryContract $repository)
    {

    }

    public function __invoke($id): ?Address
    {
        $addressId = new AddressId($id);

        return $this->repository->find($addressId);

    }
}
