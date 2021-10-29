<?php

namespace Speeden\Src\BoundedContext\Address\Domain\Contracts;

use Speeden\Src\BoundedContext\Address\Domain\Address;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressId;

interface AddressRepositoryContract
{
    public function find(AddressId $id): ?Address;

    public function save(Address $address): void;

    public function update(AddressId $addressId, Address $address): void;

    public function delete(AddressId $addressId): void;
}
