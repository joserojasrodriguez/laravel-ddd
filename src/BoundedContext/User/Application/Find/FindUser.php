<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Application\Find;

use Speeden\Src\BoundedContext\User\Application\UserAddressesResponse;
use Speeden\Src\BoundedContext\User\Application\UserAddressResponse;
use Speeden\Src\BoundedContext\User\Application\UserResponse;

use function Lambdish\Phunctional\map;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Speeden\Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;

final class FindUser
{
    public function __construct(protected UserRepositoryContract $repository)
    {

    }

    public function searchById($id): ?UserResponse
    {
        $userID = new UserId($id);
        $user = $this->repository->find($userID);
        if (null === $user) {
            throw new \RuntimeException(sprintf('User not found for id <%d>',$id), 404);
        }

        return new UserResponse(
            $user->id()->value(),
            $user->name()->value(),
            $user->email()->value(),
            $user->emailVerifiedDate()->format('Y-m-d H:i:s'),
            $user->rememberToken()->value(),
            new UserAddressesResponse(...map($this->addressToResponse(), $user->addresses()->getItems()))
        );
    }

    private function addressToResponse(): callable
    {
        return static fn(array $address) => new UserAddressResponse(
            $address['id'],
            $address['name'],
            $address['address'],
        );
    }
}
