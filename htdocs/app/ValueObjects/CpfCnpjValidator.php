<?php

namespace App\Domain\Shared\ValueObjects;

use App\Exceptions\InvalidDocumentException;

/**
 * Trait CpfCnpjValidator
 * @package App\Domain\Shared\ValueObjects
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
trait CpfCnpjValidator
{
    /**
     * @param string|null $number
     * @return bool
     * @throws \App\Exceptions\InvalidDocumentException
     */
    public static function isValidCpf(?string $number): bool
    {
        self::verifyIsNull($number);

        $number = self::filterNumbers($number);

        if (strlen($number) != 11) {
            return false;
        }

        if (filter_var($number, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/(\d)\1{10}/']]) !== false) {
            return false;
        }

        $digit2 = self::filterDigit2($number);

        return $number[10] == $digit2;
    }

    /**
     * @param string $number
     * @return bool|int
     * @SuppressWarnings(PHPMD)
     */
    private static function filterDigit2($number)
    {
        $sum = [];
        for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
            $sum[] = $number[$i] * $j;
        }

        $rest = array_sum($sum) % 11;
        $digit1 = $rest < 2 ? 0 : 11 - $rest;

        if ($number[9] != $digit1) {
            return false;
        }

        $sum = [];
        for ($i = 0, $j = 11; $i < 10; $i++, $j--) {
            $sum[] = $number[$i] * $j;
        }

        $rest = array_sum($sum) % 11;
        $digit2 = $rest < 2 ? 0 : 11 - $rest;
        return $digit2;
    }

    /**
     * @param string|null $number
     * @return bool
     * @throws \App\Exceptions\InvalidDocumentException
     * @SuppressWarnings(PHPMD)
     */
    public static function isValidCnpj(?string $number): bool
    {
        self::verifyIsNull($number);

        $number = preg_replace("/[^0-9]/", "", $number);

        if (strlen($number) != 14) {
            return false;
        }

        if (filter_var($number, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/(\d)\1{13}/']]) !== false) {
            return false;
        }

        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
            $sum += $number[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $rest = $sum % 11;

        if ($number[12] != ($rest < 2 ? 0 : 11 - $rest)) {
            return false;
        }

        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
            $sum += $number[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $rest = $sum % 11;

        return $number[13] == ($rest < 2 ? 0 : 11 - $rest);
    }

    /**
     * @param string|null $number
     * @throws \App\Exceptions\InvalidDocumentException
     */
    private static function verifyIsNull(?string $number)
    {
        if (is_null($number)) {
            throw new InvalidDocumentException();
        }
    }

    private static function filterNumbers($document): string
    {
        return preg_replace("/[^0-9]/", "", $document);
    }
}
