<?php
namespace Refactoring;

class NewReleasePrice extends Price
{
    public function getPriceCode()
    {
        return Movie::NEW_RELEASE;
    }

    public function getCharge($daysRented)
    {
        return $daysRented * 3;
    }
}
