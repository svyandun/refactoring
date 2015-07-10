<?php
namespace Refactoring;

class Rental
{
    /**
     * @var Movie
     */
    private $movie;
    private $daysRented;

    public function __construct(Movie $movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getCharge()
    {
        return $this->movie->getCharge($this->daysRented);
    }

    public function getFrequentRenterPoints()
    {
        return $this->movie->getFrequentRenterPoints($this->daysRented);
    }

    /**
     * @return Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    public function getDaysRented()
    {
        return $this->daysRented;
    }
}
