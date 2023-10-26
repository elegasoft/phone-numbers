<?php

namespace Elegasoft\Phone\Tests\DataProviders;

trait PhoneNumberDataProvider
{
    public static function sevenDigitNumbersWithExtensions(): array
    {
        $numbers = self::sevenDigitPhoneNumbers();
        $extensions = self::extensions();
        $sevenDigitNumbersWithExtensions = [];
        foreach ($numbers as $number)
        {
            foreach ($extensions as $extension)
            {
                $sevenDigitNumbersWithExtensions[] = [$number[0] . $extension];
            }
        }

        return $sevenDigitNumbersWithExtensions;
    }

    public static function sevenDigitPhoneNumbers(): array
    {

        return [
            ['1234567'],
            ['123.4567'],
            ['123-4567'],
        ];
    }

    public static function extensions(): array
    {
        return [
            'x150',
            ' x 150',
            ' ext 150',
            ', ext. 150',
        ];
    }

    public static function tenDigitNumbersWithCountryCodes(): array
    {
        $numbers = self::tenDigitPhoneNumbers();
        $countryCodes = self::countryCodes();
        $tenDigitNumbersWithCountryCodes = [];
        foreach ($numbers as $number)
        {
            foreach ($countryCodes as $countryCode)
            {
                $tenDigitNumbersWithCountryCodes[] = [$countryCode . $number[0]];
            }
        }

        return $tenDigitNumbersWithCountryCodes;
    }

    public static function tenDigitPhoneNumbers(): array
    {

        return [
            ['1234567890'],
            ['123.456.7890'],
            ['123-456-7890'],
            ['(123)456-7890'],
            ['(123) 456-7890'],
        ];
    }

    public static function countryCodes(): array
    {
        return [
            '1',
            '1 ',
            '1.',
            '1-',
            '+1',
            '+1 ',
            '+1.',
            '+1-',
            '001 ',
            '001.',
            '001-',
        ];
    }

    public static function tenDigitNumbersWithExtensions(): array
    {
        $numbers = self::tenDigitPhoneNumbers();
        $extensions = self::extensions();
        $tenDigitNumbersWithExtensions = [];
        foreach ($numbers as $number)
        {
            foreach ($extensions as $extension)
            {
                $tenDigitNumbersWithExtensions[] = [$number[0] . $extension];
            }
        }

        return $tenDigitNumbersWithExtensions;
    }

    public static function tenDigitNumbersWithCountryCodesAndExtensions(): array
    {
        $numbers = self::tenDigitPhoneNumbers();
        $countryCodes = self::countryCodes();
        $extensions = self::extensions();
        $tenDigitNumbersWithCountryCodesAndExtensions = [];
        foreach ($numbers as $number)
        {
            foreach ($countryCodes as $countryCode)
            {
                foreach ($extensions as $extension)
                {
                    $tenDigitNumbersWithCountryCodesAndExtensions[] = [$countryCode . $number[0] . $extension];
                }
            }
        }

        return $tenDigitNumbersWithCountryCodesAndExtensions;
    }

    public static function internationalPhoneNumbers(): array
    {
        return [
            'China'        => ['+86 10 6552 9988'],
            'India'        => ['+91 11 2436 7080'],
            'Indonesia'    => ['+62 21 5086 8880'],
            'Pakistan'     => ['+92 21 3453 6081'],
            'Brazil'       => ['+55 11 3042-5273'],
            'Nigeria'      => ['+234 1 270 5680'],
            'Bangladesh'   => ['+880 2-956-2890'],
            'Russia'       => ['+7 495 641-14-64'],
            'Mexico'       => ['+52 55 5521 8894'],
            'Japan'        => ['+81 3-6403-5558'],
            'Ethiopia'     => ['+251 11 551 0430'],
            'Philippines'  => ['+63 2 8555 9821'],
            'Egypt'        => ['+20 2 2269 8764'],
            'Vietnam'      => ['+84 24 7308 5599'],
            'DR Congo'     => ['+243 81 600 4713'],
            'Turkey'       => ['+90 212 272 6400'],
            'Iran'         => ['+98 21 8897 5071'],
            'Germany'      => ['+49 30 5679 5800'],
            'Thailand'     => ['+66 2 679 3410'],
            'United Kingdom' => ['+44 20 7946 0958'],
            'France'       => ['+33 1 70 18 99 00'],
            'Italy'        => ['+39 02 575 441'],
            'South Africa' => ['+27 11 083 6000'],
            'Myanmar'      => ['+95 1 654 321'],
            'South Korea'  => ['+82 2 555 9191'],
            'Colombia'     => ['+57 1 644 4900'],
            'Spain'        => ['+34 91 555 5555'],
            'Ukraine'      => ['+380 44 555 5555'],
            'Tanzania'     => ['+255 22 213 4567'],
            'Argentina'    => ['+54 11 5031 3050'],
            'Poland'       => ['+48 22 555 7777'],
            'Algeria'      => ['+213 21 69 43 50'],
            'Uganda'       => ['+256 41 425 9641'],
            'Morocco'      => ['+212 5224-22000'],
            'Iraq'         => ['+964 1 717 3311'],
            'Sudan'        => ['+249 183 771234'],
            'Peru'         => ['+51 1 215 0200'],
            'Malaysia'     => ['+60 3-5544 6000'],
            'Uzbekistan'   => ['+998 71 123 4567'],
        ];

    }
}
