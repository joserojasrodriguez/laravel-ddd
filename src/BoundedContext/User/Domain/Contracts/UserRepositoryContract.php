<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Domain\Contracts;

use Speeden\Src\BoundedContext\Address\Domain\Address;
use Speeden\Src\BoundedContext\User\Domain\User;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Speeden\Src\BoundedContext\User\Domain\ValueObjects\UserEmail;


interface UserRepositoryContract
{
    public function find(UserId $id): ?User;

    public function save(User $user): void;

    public function update(UserId $userId, User $user): void;

    public function delete(UserId $userId): void;

}
