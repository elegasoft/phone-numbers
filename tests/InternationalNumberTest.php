<?php

namespace Elegasoft\Phone\Tests;

use Elegasoft\Phone\InternationalNumber;
use Elegasoft\Phone\PhoneNumber;
use Elegasoft\Phone\Tests\DataProviders\PhoneNumberDataProvider;
use Orchestra\Testbench\TestCase;

class InternationalNumberTest extends TestCase
{
    use PhoneNumberDataProvider;

    /**
     * @test
     * @dataProvider internationalPhoneNumbers
     */
    public function it_can_format_an_internation_number($number): void
    {
        $phoneNumber = PhoneNumber::make($number);
        $this->assertInstanceOf(InternationalNumber::class, $phoneNumber);
        $this->assertEquals($number, (string)$phoneNumber);
    }
}