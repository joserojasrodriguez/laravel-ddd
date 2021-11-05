<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Application;

final class UserAddressesResponse
{
    private array $addresses;

    public function __construct(UserAddressResponse ...$addresses)
    {
        $this->addresses = $addresses;
    }

    public function addresses(): array
    {
        return $this->addresses;
    }

    public function count(): int
    {
        return count($this->addresses);
    }
}
