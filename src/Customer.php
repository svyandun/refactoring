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
        $result = "Rental Record for " . $this->getName() . "\n";
        foreach ($this->rentals as $rental) {
            // show figures for this rental
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->getCharge() . "\n";
        }
        // add footer lines
        $result .= "Amount owed is " . $this->getTotalCharge() . "\n";
        $result .= "You earned " . $this->getTotalFrequentRenterPoints() . " frequent renter points";

        return $result;
    }

    private function getTotalCharge()
    {
        $result = 0;
        foreach ($this->rentals as $rental) {
            $result += $rental->getCharge();
        }

        return $result;
    }

    private function getTotalFrequentRenterPoints()
    {
        $result = 0;
        foreach ($this->rentals as $rental) {
            $result += $rental->getFrequentRenterPoints();
        }

        return $result;
    }
}
