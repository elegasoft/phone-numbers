<?php

namespace Elegasoft\Phone;

class SevenDigitNumber extends PhoneNumber
{
    public function getFormattedPhoneNumber(): string
    {
        return preg_replace("/(\d{3})(\d{4})/", "$1-$2", $this->number);
    }
}