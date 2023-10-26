<?php

namespace Elegasoft\Phone;

class TenDigitNumber extends PhoneNumber
{
    public function getFormattedPhoneNumber(): string
    {
        return match ($this->areaCodeFormat)
        {
            AreaCodeFormat::Parenthesis => preg_replace("/(\d{3})(\d{3})(\d{4})/", '($1) $2-$3', $this->number),
            AreaCodeFormat::Dashes => preg_replace("/(\d{3})(\d{3})(\d{4})/", '$1-$2-$3', $this->number),
            default => preg_replace("/(\d{3})(\d{3})(\d{4})/", '$1 $2 $3', $this->number),
        };
    }
}
