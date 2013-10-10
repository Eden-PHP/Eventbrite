<?php

namespace Eden\Eventbrite\Tests\Eventbrite\Event;

class Search extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->token = '6KA4BFRZN4EXRUBW63TF';
        $this->id = '8545398517';
        $this->eventSearch = eden('eventbrite')
        ->event($this->token)->search();
    }

    public function testCountOnly()
    {
        $event = $this->eventSearch
            ->countOnly();

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('count_only' => 'true'),
            'query',
            $event
        );
    }

    public function testSend()
    {
        // $result = $this->eventSearch
        //     ->setKeywords('manila')
        //     ->send();

        // $this->assertArrayHasKey('events', $result);
    }

    public function testSetAddress()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setAddress($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('address' => $value),
            'query',
            $event
        );
    }

    public function testSetCategory()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setCategory($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('category' => $value),
            'query',
            $event
        );
    }

    public function testSetCountry()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setCountry($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('country' => $value),
            'query',
            $event
        );
    }

    public function testSetCity()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setCity($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('city' => $value),
            'query',
            $event
        );
    }

    public function testSetDate()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setDate($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('date' => $value),
            'query',
            $event
        );
    }

    public function testSetDateCreated()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setDateCreated($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('date_created' => $value),
            'query',
            $event
        );
    }

    public function testSetDateModified()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setDateModified($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('date_modified' => $value),
            'query',
            $event
        );
    }

    public function testSetKeywords()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setKeywords($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('keywords' => $value),
            'query',
            $event
        );
    }

    public function testSetLatitude()
    {
        $value = 10.002;
        $event = $this->eventSearch
            ->setLatitude($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('latitude' => $value),
            'query',
            $event
        );
    }

    public function testSetLongitude()
    {
        $value = 10.002;
        $event = $this->eventSearch
            ->setLongitude($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('longitude' => $value),
            'query',
            $event
        );
    }

    public function testSetMax()
    {
        $value = 100;
        $event = $this->eventSearch
            ->setMax($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('max' => $value),
            'query',
            $event
        );
    }

    public function testSetOrganizer()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setPostal($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('postal_code' => $value),
            'query',
            $event
        );
    }

    public function testSetPostal()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setPostal($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('postal_code' => $value),
            'query',
            $event
        );
    }

    public function testSetRegion()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setRegion($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('region' => $value),
            'query',
            $event
        );
    }

    public function testSetWithin()
    {
        $value = 1;
        $event = $this->eventSearch
            ->setWithin($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('within' => $value),
            'query',
            $event
        );
    }

    public function testSetWithinUnit()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setWithinUnit($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('within_unit' => $value),
            'query',
            $event
        );
    }

    public function testSortByCity()
    {
        $event = $this->eventSearch
            ->sortByCity();
        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('sort_by' => 'city'),
            'query',
            $event
        );
    }

    public function testSortByDate()
    {
        $event = $this->eventSearch
            ->sortByDate();

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('sort_by' => 'date'),
            'query',
            $event
        );
    }

    public function testSortById()
    {
        $event = $this->eventSearch
            ->sortById();

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('sort_by' => 'id'),
            'query',
            $event
        );
    }

    public function testSortByName()
    {
        $event = $this->eventSearch
            ->sortByName();

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('sort_by' => 'name'),
            'query',
            $event
        );
    }

    public function testSetPage()
    {
        $value = 100;
        $event = $this->eventSearch
            ->setPage($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('page' => $value),
            'query',
            $event
        );
    }

    public function testSetSince()
    {
        $value = 1234567;
        $event = $this->eventSearch
            ->setSince($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('since_id' => $value),
            'query',
            $event
        );
    }

    public function testSetTracking()
    {
        $value = 'value';
        $event = $this->eventSearch
            ->setTracking($value);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Search', $event);
        $this->assertAttributeEquals(
            array('tracking_link' => $value),
            'query',
            $event
        );
    }
}
