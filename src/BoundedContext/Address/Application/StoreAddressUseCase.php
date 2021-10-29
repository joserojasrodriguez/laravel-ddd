<?php
declare(strict_types=1);
namespace Speeden\Src\BoundedContext\Address\Application;

use Speeden\Src\BoundedContext\Address\Domain\Address;
use Speeden\Src\BoundedContext\Address\Domain\Contracts\AddressRepositoryContract;

final class StoreAddressUseCase
{
    public function __construct(protected AddressRepositoryContract $repository)
    {

    }

    public function __invoke(array $data): bool
    {
        $address = Address::fromPrimitives(
            $data['userId'],
            $data['name'],
            $data['address'],
            $data['locality'],
            $data['state'],
            $data['postalCode'],
            $data['country']
        );

        try {
            $this->repository->save($address);
            return true;
        } catch (\Exception $exception) {
            return false;
        }

    }
}
