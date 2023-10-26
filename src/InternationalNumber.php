<?php

namespace Elegasoft\Phone;

class InternationalNumber extends PhoneNumber
{
    public function getFormattedPhoneNumber(): string
    {
        return $this->number;
    }
}
