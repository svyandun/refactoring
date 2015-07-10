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

    public function getFrequentRenterPoints($daysRented)
    {
        return $daysRented > 1 ? 2 : 1;
    }
}
