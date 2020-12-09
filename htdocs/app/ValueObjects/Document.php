<?php

namespace App\Domain\Shared\ValueObjects;

use App\Exceptions\InvalidDocumentException;

/**
 * Class Document
 * @package App\Domain\Shared\ValueObjects
 */
final class Document
{
    use CpfCnpjValidator;

    public const TYPE_CPF = 'cpf';
    public const TYPE_CNPJ = 'cnpj';

    protected string $number;
    protected string $type;

    /**
     * Document constructor.
     * @param string $number
     * @throws \App\Exceptions\InvalidDocumentException
     */
    public function __construct(string $number)
    {
        $this->setNumber($number);

        if (self::isValidCpf($number)) {
            $this->setTypeCpf();

            return;
        }

        if (self::isValidCnpj($number)) {
            $this->setTypeCnpj();

            return;
        }

        throw new InvalidDocumentException($number);
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    private function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    private function setTypeCpf(): void
    {
        $this->type = self::TYPE_CPF;
    }

    /**
     * @return void
     */
    private function setTypeCnpj(): void
    {
        $this->type = self::TYPE_CNPJ;
    }
}
