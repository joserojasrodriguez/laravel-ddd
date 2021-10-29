<?php
declare(strict_types=1);

namespace Speeden\Src\Shared\ValueObjects;

use InvalidArgumentException;

abstract class EmailValueObject extends StringValueObject
{
    public function __construct(protected \Stringable|string $value)
    {
        $this->validate($this->value);
    }

    private function validate(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the invalid email: <%s>.', static::class, $value)
            );
        }
    }
}
