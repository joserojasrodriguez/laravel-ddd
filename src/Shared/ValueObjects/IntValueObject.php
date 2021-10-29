<?php
declare(strict_types=1);

namespace Speeden\Src\Shared\ValueObjects;

use InvalidArgumentException;

abstract class IntValueObject implements ValueObject
{
    public function __construct(protected int $value)
    {
        $this->validate($value);
    }


    private function validate(int $value): void
    {
        $options = array(
            'options' => array(
                'min_range' => 1
            )
        );

        if (!filter_var($value, FILTER_VALIDATE_INT, $options)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>', static::class, $value)
            );
        }
    }

    public static function from(int $value): static
    {
        return new static($value);
    }

    public function equalTo(object $other): bool
    {
        return static::class === get_class($other)
            && $this->value() === $other->value();
    }

    public function isBiggerThan(object $other): bool
    {
        return static::class === get_class($other)
            && $this->value() > $other->value();
    }

    final public function jsonSerialize(): int
    {
        return $this->value;
    }

    public function value(): int
    {
        return $this->value;
    }

}
