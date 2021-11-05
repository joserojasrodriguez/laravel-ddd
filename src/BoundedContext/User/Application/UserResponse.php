<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Application;

use JetBrains\PhpStorm\ArrayShape;
use function Lambdish\Phunctional\map;

final class UserResponse
{
    public function __construct(private int    $id, private string $name, private string $email, private string $email_verified_at,
                                private string $remember_token, private UserAddressesResponse $addresses)
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

    public function email(): string
    {
        return $this->email;
    }

    public function emailVerifiedAt(): string
    {
        return $this->email_verified_at;
    }

    public function rememberToken(): string
    {
        return $this->remember_token;
    }

    public function addresses(): UserAddressesResponse
    {
        return $this->addresses;
    }

    public function toResponse(): array
    {
        return [
            'id'                => $this->id(),
            'name'              => $this->name(),
            'email'             => $this->email(),
            'email_verified_at' => $this->emailVerifiedAt(),
            'remember_token'    => $this->rememberToken(),
            'addresses'         => [
                'count' => $this->addresses()->count(),
                'data'  => array_map(fn(UserAddressResponse $address) => [
                    'id'      => $address->id(),
                    'name'    => $address->name(),
                    'address' => $address->address(),
                ]
                    , $this->addresses()->addresses())
            ]
        ];

    }
}
