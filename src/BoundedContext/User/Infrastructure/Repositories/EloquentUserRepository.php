<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Infrastructure\Repositories;

use Speeden\Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Speeden\Models\User as EloquentUserModel;
use Speeden\Src\BoundedContext\User\Domain\User;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserAddressCollection;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserRememberToken;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;


final class EloquentUserRepository implements UserRepositoryContract
{
    public function __construct(private EloquentUserModel $eloquentUserModel)
    {

    }

    /**
     * @throws \Exception
     */
    public function find(UserId $id): ?User
    {
        $user = $this->eloquentUserModel->find($id->value());

        if (null === $user) {
            return null;
        }
        return new User(
            new UserName($user->name),
            new UserEmail($user->email),
            UserEmailVerifiedDate::fromDateTime($user->email_verified_at->format('Y-m-d H:i:s')),
            new UserPassword($user->password),
            new UserRememberToken($user->remember_token),
            UserAddressCollection::fromArray($user->address->toArray()),
            new UserId($user->id)
        );

    }


    public function save(User $user): void
    {
        $newUser = $this->eloquentUserModel;

        $data = [
            'name'              => $user->name()->value(),
            'email'             => $user->email()->value(),
            'email_verified_at' => $user->emailVerifiedDate()->value(),
            'password'          => $user->password()->value(),
            'remember_token'    => $user->rememberToken()->value(),
        ];

        $newUser->create($data);
    }

    public function update(UserId $id, User $user): void
    {
        $userToUpdate = $this->eloquentUserModel;

        $data = [
            'name'  => $user->name()->value(),
            'email' => $user->email()->value(),
        ];

        $userToUpdate
            ->findOrFail($id->value())
            ->update($data);
    }

    public function delete(UserId $id): void
    {
        $this->eloquentUserModel
            ->findOrFail($id->value())
            ->delete();
    }
}
