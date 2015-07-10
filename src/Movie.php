<?php
namespace Refactoring;

use InvalidArgumentException;

class Movie
{
    const CHILDRENS = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    private $title;
    /**
     * @var Price
     */
    private $price;

    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
    }

    public function getCharge($daysRented)
    {
        $result = 0;
        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($daysRented > 2) {
                    $result += ($daysRented - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += $daysRented * 3;
                break;
            case Movie::CHILDRENS:
                $result += 1.5;
                if ($daysRented > 3) {
                    $result += ($daysRented - 3) * 1.5;
                }
                break;
        }

        return $result;
    }

    public function getFrequentRenterPoints($daysRented)
    {
        if ($this->getPriceCode() == Movie::NEW_RELEASE && $daysRented > 1) {
            return 2;
        }

        return 1;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPriceCode()
    {
        return $this->price->getPriceCode();
    }

    public function setPriceCode($priceCode)
    {
        switch ($priceCode) {
            case self::REGULAR:
                $this->price = new RegularPrice();
                break;
            case self::CHILDRENS:
                $this->price = new ChildrensPrice();
                break;
            case self::NEW_RELEASE:
                $this->price = new NewReleasePrice();
                break;
            default:
                throw new InvalidArgumentException('Incorrect Price Code');
        }
    }
}
