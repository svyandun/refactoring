<?php
namespace Refactoring;

abstract class Price
{
    abstract public function getPriceCode();

    abstract public function getCharge($daysRented);

    public function getFrequentRenterPoints($daysRented)
    {
        if ($this->getPriceCode() == Movie::NEW_RELEASE && $daysRented > 1) {
            return 2;
        }

        return 1;
    }
}
