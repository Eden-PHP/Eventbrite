<?php

namespace Eden\Eventbrite\Tests\Eventbrite;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->clientId = '';
        $this->appSecret = '';
        $this->redirect = 'http://localhost/';
        $this->user = '';
        $this->api = '';
    }

    public function testAuth()
    {
        $class = eden('eventbrite')
        ->auth($this->clientId, $this->appSecret, $this->redirect);
        $this->assertInstanceOf('Eden\\Eventbrite\\Oauth', $class);
    }

    public function testDiscount()
    {
         $class = eden('eventbrite')->discount($this->user, $this->api);
        $this->assertInstanceOf('Eden\\Eventbrite\\Discount', $class);
    }

    public function testEvent()
    {
        $class = eden('eventbrite')->event($this->user, $this->api);
        $this->assertInstanceOf('Eden\\Eventbrite\\Event', $class);
    }

    public function testOrganizer()
    {
        $class = eden('eventbrite')->organizer($this->user, $this->api);
        $this->assertInstanceOf('Eden\\Eventbrite\\Organizer', $class);
    }

    public function testPayment()
    {
        $class = eden('eventbrite')->payment($this->user, $this->api);
        $this->assertInstanceOf('Eden\\Eventbrite\\Payment', $class);
    }

    public function testSearch()
    {
        $class = eden('eventbrite')->search($this->user, $this->api);
        $this->assertInstanceOf('Eden\\Eventbrite\\Event\\Search', $class);
    }

    public function testSet()
    {
        $class = eden('eventbrite')->set($this->user, $this->api);
        $this->assertInstanceOf('Eden\\Eventbrite\\Event\\Set', $class);
    }

    public function testTicket()
    {
        $class = eden('eventbrite')->ticket($this->user, $this->api);
        $this->assertInstanceOf('Eden\\Eventbrite\\Ticket', $class);
    }

    public function testUser()
    {
        $class = eden('eventbrite')->user($this->user, $this->api);
        $this->assertInstanceOf('Eden\\Eventbrite\\User', $class);
    }

    public function testVenue()
    {
        $class = eden('eventbrite')->venue($this->user, $this->api);
        $this->assertInstanceOf('Eden\\Eventbrite\\Venue', $class);
    }
}
