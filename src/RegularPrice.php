<?php
namespace Refactoring;

class RegularPrice extends Price
{
    public function getPriceCode()
    {
        return Movie::REGULAR;
    }
}
