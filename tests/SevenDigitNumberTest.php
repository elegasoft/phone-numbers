<?php

namespace Elegasoft\Phone\Tests;

use Elegasoft\Phone\PhoneNumber;
use Elegasoft\Phone\SevenDigitNumber;
use Elegasoft\Phone\Tests\DataProviders\PhoneNumberDataProvider;
use Orchestra\Testbench\TestCase;

class SevenDigitNumberTest extends TestCase
{
    use PhoneNumberDataProvider;

    /**
     * @test
     *
     * @dataProvider sevenDigitPhoneNumbers
     */
    public function it_formats_a_seven_digit_number_correctly($number)
    {
        $phoneNumber = PhoneNumber::make($number);
        $this->assertInstanceOf(SevenDigitNumber::class, $phoneNumber);
        $this->assertEquals('123-4567', (string)$phoneNumber);
    }

    /**
     * @test
     *
     * @dataProvider sevenDigitNumbersWithExtensions
     */
    public function it_formats_a_seven_digit_with_extensions($number)
    {
        $phoneNumber = PhoneNumber::make($number);
        $this->assertInstanceOf(SevenDigitNumber::class, $phoneNumber);
        $this->assertEquals('123-4567, ext. 150', (string)$phoneNumber);
    }
}
