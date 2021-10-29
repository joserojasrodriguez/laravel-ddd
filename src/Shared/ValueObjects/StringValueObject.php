<?php

namespace Speeden\Src\Shared\ValueObjects;

abstract class StringValueObject implements ValueObject
{

    public function __construct(protected \Stringable|string $value)
    {

    }

    public static function from(string $value): static
    {
        return new static($value);
    }

    public function equalTo(object $other): bool
    {
        return static::class === get_class($other)
            && $this->value() === $other->value();
    }

    final public function jsonSerialize(): string
    {
        return $this->value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
