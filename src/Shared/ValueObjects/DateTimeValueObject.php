<?php
declare(strict_types=1);

namespace Speeden\Src\Shared\ValueObjects;

use DateTimeZone;

abstract class DateTimeValueObject extends \DateTimeImmutable implements ValueObject
{
    /**
     * @param string $datetime
     * @param DateTimeZone|null $timezone
     * @throws \Exception
     */
    public function __construct($datetime = "now", DateTimeZone $timezone = null)
    {
        if (null === $timezone) {
            $timezone = new \DateTimeZone('UTC');
        }
        parent::__construct($datetime, $timezone);
    }

    /**
     * @throws \Exception
     */
    final public static function from(string $str): self
    {
        return new static($str, new \DateTimeZone('UTC'));
    }

    /**
     * @throws \Exception
     */
    final public static function fromTimestamp(int $timestamp): self
    {
        $dateTime = \DateTimeImmutable::createFromFormat('U', (string)$timestamp);

        return static::from($dateTime->format(\DATE_RFC3339));
    }

    /**
     * @throws \Exception
     */
    final public static function fromDate(string $date): self
    {
        $dateTime = \DateTimeImmutable::createFromFormat('Y-m-d 00:00:00', (string)$date);

        return static::from($dateTime->format(\DATE_RFC3339));
    }

    /**
     * @throws \Exception
     */
    final public static function fromDateTime(string $date): self
    {
        $dateTime = \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', (string)$date);

        return static::from($dateTime->format(\DATE_RFC3339));
    }

    public function equalTo(object $other): bool
    {
        return static::class !== $other::class
            && $this->getTimestamp() === $other->getTimestamp();
    }

    final public function jsonSerialize(): string
    {
        return $this->format(\DATE_RFC3339);
    }
}
