<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\Address\Infrastructure\Repositories;

use Speeden\Models\Address as EloquentAddressModel;
use Speeden\Src\BoundedContext\Address\Domain\Address;
use Speeden\Src\BoundedContext\Address\Domain\Contracts\AddressRepositoryContract;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressAddress;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressCountry;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressId;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressLocality;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressName;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressPostalCode;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressState;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressUserId;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressUserName;

final class EloquentAddressRepository implements AddressRepositoryContract
{
    public function __construct(private EloquentAddressModel $eloquentAddressModel)
    {

    }

    public function find(AddressId $id): ?Address
    {
        $address = $this->eloquentAddressModel->find($id->value());

        if (null === $address) {
            return null;
        }
        return new Address(
            new AddressUserId($address->user_id),
            new AddressName($address->name),
            new AddressAddress($address->address),
            new AddressLocality($address->locality),
            new AddressState($address->state),
            new AddressPostalCode($address->postal_code),
            new AddressCountry($address->country),
            new AddressUserName($address->user->name),
            new AddressId($address->id),
        );
    }

    public function save(Address $address): void
    {
        $newAddress = $this->eloquentAddressModel;

        $data = [
            'user_id'     => $address->userId()->value(),
            'name'        => $address->name()->value(),
            'address'     => $address->address()->value(),
            'locality'    => $address->locality()->value(),
            'state'       => $address->state()->value(),
            'postal_code' => $address->postalCode()->value(),
            'country'     => $address->country()->value()
        ];

        $newAddress->create($data);
    }

    public function update(AddressId $addressId, Address $address): void
    {
        // TODO: Implement update() method.
    }

    public function delete(AddressId $addressId): void
    {
        // TODO: Implement delete() method.
    }
}
