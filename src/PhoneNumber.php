<?php

namespace Elegasoft\Phone;

abstract class PhoneNumber
{
    public function __construct(
        public string $number,
        public ?string $countryCode = null,
        public ?string $extension = null,
        public AreaCodeFormat $areaCodeFormat = AreaCodeFormat::Parenthesis
    )
    {

    }

    public static function make(
        string $number,
        AreaCodeFormat $areaCodeFormat = AreaCodeFormat::Parenthesis
    ): PhoneNumber
    {
        if (preg_match('/^\+(?!1|001)\S/', $number))
        {
            return new InternationalNumber(number: $number);
        }

        $number = preg_replace("/[^0-9x+]/", "", $number);
        [$preExtensionNumber, $extension] = str_contains($number, 'x') ? explode('x', $number) : [$number, null];
        $matches = [];
        preg_match_all('/\d/', $preExtensionNumber, $matches);
        if (count($matches[0]) < 10)
        {
            return new SevenDigitNumber(number: $preExtensionNumber, extension: $extension,
                areaCodeFormat: $areaCodeFormat);
        }
        $countryCode = null;
        if (strlen($preExtensionNumber) > 10)
        {
            $countryCode = ltrim(substr($preExtensionNumber, 0, -10), '0');
            $preExtensionNumber = substr($preExtensionNumber, -10);
        }

        return new TenDigitNumber(number: $preExtensionNumber, countryCode: $countryCode,
            extension: $extension, areaCodeFormat: $areaCodeFormat);
    }

    public function __toString(): string
    {
        return $this->formatPhoneNumber();
    }

    /**
     * Formats the phone number by combining the country code, formatted phone number, and extension.
     *
     * @return string
     */
    public function formatPhoneNumber(): string
    {
        $parts = [
            $this->formatCountryCode(),
            $this->getFormattedPhoneNumber(),
            $this->formatExtension(),
        ];

        $formattedNumber = implode('', array_filter($parts));

        return $this->normalizePlusSigns($formattedNumber);
    }

    /**
     * Formats the country code.
     *
     * @return string|null
     */
    protected function formatCountryCode(): ?string
    {
        return match ($this->areaCodeFormat)
        {
            AreaCodeFormat::Parenthesis => $this->countryCode ? '+' . $this->countryCode : null,
            AreaCodeFormat::Dashes => $this->countryCode ? '+' . $this->countryCode . '-' : null,
            default => $this->countryCode ? '+' . $this->countryCode . ' ' : null,
        };
    }

    abstract public function getFormattedPhoneNumber(): string;

    /**
     * Formats the extension.
     *
     * @return string|null
     */
    protected function formatExtension(): ?string
    {
        return $this->extension ? ', ext. ' . $this->extension : null;
    }

    /**
     * Normalizes multiple plus signs to a single plus sign.
     *
     * @param string $number
     *
     * @return string
     */
    protected function normalizePlusSigns(string $number): string
    {
        return str_replace('++', '+', $number);
    }
}
