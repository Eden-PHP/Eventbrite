<?php

namespace Eden\Eventbrite\Tests\Eventbrite;

class Venue extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->id = 4348639;
        $this->organizerId = 4747524661;
        $this->name = 'name';
        $this->address = 'address 1';
        $this->address2 = 'address 2';
        $this->city = 'city';
        $this->region = 'region';
        $this->postalCode = '1234';
        $this->countryCode = 'PH';

        $this->token = '6KA4BFRZN4EXRUBW63TF';
        $this->venue = eden('eventbrite')
            ->venue($this->token);
    }

    public function testSetId()
    {
        // $id = $this->id;
        // $venue = $this->venue
        //     ->setId($id);

        // $this->assertInstanceOf('Eden\Eventbrite\Venue', $venue);
        // $this->assertAttributeEquals(
        //     array('id' => $id),
        //     'query',
        //     $venue
        // );
    }

    public function testSetOrganizerId()
    {
        // $organizerId = $this->organizerId;
        // $venue = $this->venue
        //     ->setOrganizerId($organizerId);

        // $this->assertInstanceOf('Eden\Eventbrite\Venue', $venue);
        // $this->assertAttributeEquals(
        //     array('organizer_id' => $organizerId),
        //     'query',
        //     $venue
        // );
    }

    public function testSetName()
    {
        // $name = $this->name;
        // $venue = $this->venue
        //     ->setName($name);

        // $this->assertInstanceOf('Eden\Eventbrite\Venue', $venue);
        // $this->assertAttributeEquals(
        //     array('name' => $name),
        //     'query',
        //     $venue
        // );
    }

    public function testSetAddress()
    {
        // $address = $this->address;
        // $venue = $this->venue
        //     ->setAddress($address);

        // $this->assertInstanceOf('Eden\Eventbrite\Venue', $venue);
        // $this->assertAttributeEquals(
        //     array('address' => $address),
        //     'query',
        //     $venue
        // );
    }

    public function testSetAddress2()
    {
        // $address = $this->address2;
        // $venue = $this->venue
        //     ->setAddress2($address);

        // $this->assertInstanceOf('Eden\Eventbrite\Venue', $venue);
        // $this->assertAttributeEquals(
        //     array('address_2' => $address),
        //     'query',
        //     $venue
        // );
    }

    public function testSetCity()
    {
        // $city = $this->city;
        // $venue = $this->venue
        //     ->setCity($city);

        // $this->assertInstanceOf('Eden\Eventbrite\Venue', $venue);
        // $this->assertAttributeEquals(
        //     array('city' => $city),
        //     'query',
        //     $venue
        // );
    }

    public function testSetRegion()
    {
        // $region = $this->region;
        // $venue = $this->venue
        //     ->setRegion($region);

        // $this->assertInstanceOf('Eden\Eventbrite\Venue', $venue);
        // $this->assertAttributeEquals(
        //     array('region' => $region),
        //     'query',
        //     $venue
        // );
    }

    public function testSetPostalCode()
    {
        // $postalCode = $this->postalCode;
        // $venue = $this->venue
        //     ->setPostalCode($postalCode);

        // $this->assertInstanceOf('Eden\Eventbrite\Venue', $venue);
        // $this->assertAttributeEquals(
        //     array('postal_code' => $postalCode),
        //     'query',
        //     $venue
        // );
    }

    public function testSetCountryCode()
    {
        // $countryCode = $this->countryCode;
        // $venue = $this->venue
        //     ->setCountryCode($countryCode);

        // $this->assertInstanceOf('Eden\Eventbrite\Venue', $venue);
        // $this->assertAttributeEquals(
        //     array('country_code' => $countryCode),
        //     'query',
        //     $venue
        // );
    }

    public function testCreate()
    {
        // $venue = $this->venue
        //     ->setOrganizerId($this->organizerId)
        //     ->setName($this->name)
        //     ->setCountryCode($this->countryCode)
        //     ->create();

        // $this->assertArrayHasKey('process', $venue);
        // $this->assertArrayHasKey('status', $venue['process']);
        // $this->assertTrue($venue['process']['status'] == 'OK');
    }


    public function testUpdate()
    {
        // $venue = $this->venue
        //     ->setId($this->id)
        //     ->setName('updated name 2')
        //     ->update();

        // $this->assertArrayHasKey('process', $venue);
        // $this->assertArrayHasKey('status', $venue['process']);
        // $this->assertTrue($venue['process']['status'] == 'OK');
    }
}
