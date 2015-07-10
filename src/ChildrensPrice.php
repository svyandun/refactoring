<?php
namespace Refactoring;

class ChildrensPrice extends Price
{
    public function getPriceCode()
    {
        return Movie::CHILDRENS;
    }

    public function getCharge($daysRented)
    {
        $result = 1.5;
        if ($daysRented > 3) {
            $result += ($daysRented - 3) * 1.5;
        }

        return $result;
    }
}
