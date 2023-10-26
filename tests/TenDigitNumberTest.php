<?php

namespace Elegasoft\Phone\Tests;

use Elegasoft\Phone\AreaCodeFormat;
use Elegasoft\Phone\PhoneNumber;
use Elegasoft\Phone\TenDigitNumber;
use Elegasoft\Phone\Tests\DataProviders\PhoneNumberDataProvider;
use Orchestra\Testbench\TestCase;

class TenDigitNumberTest extends TestCase
{
    use PhoneNumberDataProvider;

    /**
     * @test
     *
     * @dataProvider tenDigitPhoneNumbers
     */
    public function it_formats_a_ten_digit_numbers_with_parenthesis($tenDigitPhoneNumber): void
    {
        $phoneNumber = PhoneNumber::make(number: $tenDigitPhoneNumber, areaCodeFormat: AreaCodeFormat::Parenthesis);
        $this->assertEquals('(123) 456-7890', (string)$phoneNumber);
    }

    /**
     * @test
     *
     * @dataProvider tenDigitPhoneNumbers
     */
    public function it_formats_a_ten_digit_numbers_with_dashes($tenDigitPhoneNumber): void
    {
        $phoneNumber = PhoneNumber::make(number: $tenDigitPhoneNumber, areaCodeFormat: AreaCodeFormat::Dashes);
        $this->assertEquals('123-456-7890', (string)$phoneNumber);
    }

    /**
     * @test
     *
     * @dataProvider tenDigitNumbersWithExtensions
     */
    public function it_formats_a_ten_digit_numbers_with_extensions_and_parenthesis($numberWithExtension): void
    {
        $phoneNumber = PhoneNumber::make(number: $numberWithExtension, areaCodeFormat: AreaCodeFormat::Parenthesis);
        $this->assertInstanceOf(TenDigitNumber::class, $phoneNumber);
        $this->assertEquals('(123) 456-7890, ext. 150', (string)$phoneNumber);
    }

    /**
     * @test
     *
     * @dataProvider tenDigitNumbersWithExtensions
     */
    public function it_formats_a_ten_digit_numbers_with_extensions_and_dashes($numberWithExtension): void
    {
        $phoneNumber = PhoneNumber::make(number: $numberWithExtension, areaCodeFormat: AreaCodeFormat::Dashes);
        $this->assertInstanceOf(TenDigitNumber::class, $phoneNumber);
        $this->assertEquals('123-456-7890, ext. 150', (string)$phoneNumber);
    }

    /**
     * @test
     *
     * @dataProvider tenDigitNumbersWithCountryCodes
     */
    public function it_formats_a_ten_digit_numbers_with_country_codes_and_parenthesis($numberWithCountryCode): void
    {
        $phoneNumber = PhoneNumber::make(number: $numberWithCountryCode, areaCodeFormat: AreaCodeFormat::Parenthesis);
        $this->assertInstanceOf(TenDigitNumber::class, $phoneNumber);
        $this->assertEquals('+1(123) 456-7890', (string)$phoneNumber);
    }

    /**
     * @test
     *
     * @dataProvider tenDigitNumbersWithCountryCodes
     */
    public function it_formats_a_ten_digit_numbers_with_country_codes_and_dashes($numberWithCountryCode): void
    {
        $phoneNumber = PhoneNumber::make(number: $numberWithCountryCode, areaCodeFormat: AreaCodeFormat::Dashes);
        $this->assertInstanceOf(TenDigitNumber::class, $phoneNumber);
        $this->assertEquals('+1-123-456-7890', (string)$phoneNumber);
    }

    /**
     * @test
     *
     * @dataProvider tenDigitNumbersWithCountryCodesAndExtensions
     */
    public function it_formats_a_ten_digit_numbers_with_country_codes_extensions_and_parenthesis($numberWithCountryCode): void
    {
        $phoneNumber = PhoneNumber::make(number: $numberWithCountryCode, areaCodeFormat: AreaCodeFormat::Parenthesis);
        $this->assertInstanceOf(TenDigitNumber::class, $phoneNumber);
        $this->assertEquals('+1(123) 456-7890, ext. 150', (string)$phoneNumber);
    }

    /**
     * @test
     *
     * @dataProvider tenDigitNumbersWithCountryCodesAndExtensions
     */
    public function it_formats_a_ten_digit_numbers_with_country_codes_extensions_and_dashes($numberWithCountryCode): void
    {
        $phoneNumber = PhoneNumber::make(number: $numberWithCountryCode, areaCodeFormat: AreaCodeFormat::Dashes);
        $this->assertInstanceOf(TenDigitNumber::class, $phoneNumber);
        $this->assertEquals('+1-123-456-7890, ext. 150', (string)$phoneNumber);
    }
}
