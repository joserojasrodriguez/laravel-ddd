<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\Address\Domain;

use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressId;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressName;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressState;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressUserId;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressAddress;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressCountry;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressLocality;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressPostalCode;
use Speeden\Src\BoundedContext\Address\Domain\ValueObjects\AddressUserName;

final class Address
{
    public function __construct(
        private AddressUserId     $userId,
        private AddressName       $name,
        private AddressAddress    $address,
        private AddressLocality   $locality,
        private AddressState      $state,
        private AddressPostalCode $postalCode,
        private AddressCountry    $country,
        private ?AddressUserName  $userName = null,
        private ?AddressId        $id = null,
    )
    {

    }

    public function id(): AddressId
    {
        return $this->id;
    }

    public function userId(): AddressUserId
    {
        return $this->userId;
    }

    public function name(): AddressName
    {
        return $this->name;
    }

    public function address(): AddressAddress
    {
        return $this->address;
    }

    public function locality(): AddressLocality
    {
        return $this->locality;
    }

    public function state(): AddressState
    {
        return $this->state;
    }

    public function postalCode(): AddressPostalCode
    {
        return $this->postalCode;
    }

    public function country(): AddressCountry
    {
        return $this->country;
    }

    public function userName(): AddressUserName
    {
        return $this->userName;
    }

    public static function create(
        AddressUserId     $userId,
        AddressName       $name,
        AddressAddress    $address,
        AddressLocality   $locality,
        AddressState      $state,
        AddressPostalCode $postalCode,
        AddressCountry    $country
    ): Address
    {
        return new self($userId, $name, $address, $locality, $state, $postalCode, $country);
    }

    public static function fromPrimitives(
        int $userId, string $name, string $address, string $locality, string $state, string $postalCode, string $country
    ): Address
    {
        return new self(
            AddressUserId::from($userId),
            AddressName::from($name),
            AddressAddress::from($address),
            AddressLocality::from($locality),
            AddressState::from($state),
            AddressPostalCode::from($postalCode),
            AddressCountry::from($postalCode)
        );
    }
}
