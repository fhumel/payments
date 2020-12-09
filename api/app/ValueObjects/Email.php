<?php

namespace App\Domain\Shared\ValueObjects;

use App\Exceptions\InvalidEmailException;

/**
 * Class Email
 * @package App\Domain\Shared\ValueObjects
 */
class Email
{
    protected string $value;

    /**
     * Email constructor.
     * @param string $value
     * @throws \App\Exceptions\InvalidEmailException
     */
    public function __construct(string $value)
    {
        if (!self::isValid($value)) {
            throw new InvalidEmailException();
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function isValid(?string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
