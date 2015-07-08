<?php
namespace Refactoring\Test;

use PHPUnit_Framework_TestCase;
use Refactoring\Customer;
use Refactoring\Movie;
use Refactoring\Rental;

class VideoStoreTest extends PHPUnit_Framework_TestCase
{
    public function testNewReleaseStatement()
    {
        $john = new Customer('John');
        $john->addRental(new Rental(new Movie('Jurassic World', Movie::NEW_RELEASE), 2));
        $john->addRental(new Rental(new Movie('Terminator Genisys', Movie::NEW_RELEASE), 1));
        $this->assertEquals(
            "Rental Record for John\n" .
            "\tJurassic World\t6\n" .
            "\tTerminator Genisys\t3\n" .
            "Amount owed is 9\n" .
            "You earned 3 frequent renter points",
            $john->statement());
    }

    public function testChildrensStatement()
    {
        $jane = new Customer('Jane');
        $jane->addRental(new Rental(new Movie('Home', Movie::CHILDRENS), 5));
        $jane->addRental(new Rental(new Movie('Ted 2', Movie::CHILDRENS), 1));
        $this->assertEquals(
            "Rental Record for Jane\n" .
            "\tHome\t4.5\n" .
            "\tTed 2\t1.5\n" .
            "Amount owed is 6\n" .
            "You earned 2 frequent renter points",
            $jane->statement());
    }

    public function testRegularStatement()
    {
        $fred = new Customer('Fred');
        $fred->addRental(new Rental(new Movie('Star Wars', Movie::REGULAR), 3));
        $fred->addRental(new Rental(new Movie('Star Trek', Movie::REGULAR), 1));
        $this->assertEquals(
            "Rental Record for Fred\n" .
            "\tStar Wars\t3.5\n" .
            "\tStar Trek\t2\n" .
            "Amount owed is 5.5\n" .
            "You earned 2 frequent renter points",
            $fred->statement());
    }
}
