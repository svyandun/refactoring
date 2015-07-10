<?php
namespace Refactoring;

class Customer
{
    private $name;
    private $rentals = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    public function getName()
    {
        return $this->name;
    }

    public function statement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";
        foreach ($this->rentals as $rental) {
            $thisAmount = $rental->getCharge();

            // add frequent renter points
            $frequentRenterPoints++;
            // add bonus for a two day new release rental
            if ($rental->getMovie()->getPriceCode() == Movie::NEW_RELEASE &&
                $rental->getDaysRented() > 1
            ) {
                $frequentRenterPoints++;
            }

            // show figures for this rental
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $thisAmount . "\n";
            $totalAmount += $thisAmount;
        }
        // add footer lines
        $result .= "Amount owed is " . $totalAmount . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points";

        return $result;
    }
}
