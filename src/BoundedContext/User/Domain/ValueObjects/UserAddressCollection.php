<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Domain\ValueObjects;

use Speeden\Src\Shared\Collection;

final class UserAddressCollection extends Collection
{
    public static function fromArray(?array $addresses): UserAddressCollection
    {
        return self::from(self::parseAddresses($addresses));
    }

    private static function parseAddresses(?array $addresses): array
    {
        return array_map(fn(array $address) => [
            'id'     => $address['id'],
            'name'   => $address['name'],
            'addres' => $address['address']
        ], $addresses);
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
