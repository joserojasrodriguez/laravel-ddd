<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Domain;

use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserAddressCollection;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserRememberToken;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;

final class User
{
    public function __construct(
        private UserName               $name,
        private UserEmail              $email,
        private UserEmailVerifiedDate  $emailVerifiedDate,
        private UserPassword           $password,
        private UserRememberToken      $rememberToken,
        private ?UserAddressCollection $addressCollection = null,
    )
    {
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function emailVerifiedDate(): UserEmailVerifiedDate
    {
        return $this->emailVerifiedDate;
    }

    public function rememberToken(): UserRememberToken
    {
        return $this->rememberToken;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function addresses(): UserAddressCollection
    {
        return $this->addressCollection;
    }

    public static function create(
        UserName              $name,
        UserEmail             $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword          $password,
        UserRememberToken     $rememberToken
    ): User
    {
        return new self($name, $email, $emailVerifiedDate, $password, $rememberToken);
    }
}
