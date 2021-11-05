<?php
declare(strict_types=1);

namespace Speeden\Src\BoundedContext\User\Application;

final class UsersResponse
{
    private array $users;

    public function __construct(UserResponse ...$users)
    {
        $this->users = $users;
    }

    public function users(): array
    {
        return $this->users;
    }
}
