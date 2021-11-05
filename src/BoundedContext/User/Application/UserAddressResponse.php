<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Application;

final class UserAddressResponse
{
    public function __construct(private int $id, private string $name, private string $address)
    {

    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function address(): string
    {
        return $this->address;
    }
}
