<?php
declare(strict_types=1);

namespace Speeden\Src\Shared\ValueObjects;

interface ValueObject extends \JsonSerializable
{
    public function equalTo(object $other): bool;
}
