<?php

namespace Eden\Eventbrite\Tests\Eventbrite;

class EventTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->key = '7UMLFRQTSZR4QIFTD2';
        $this->secret = 'S6BRTDJRHMRO7VLHWC3EVRARAAVEJJQLWE5KW75JQGVR5NV2QQ';
        $this->redirectUrl = 'http://localhost/';
        $this->responseKey = '3TBXH4JTITJUHEMARNAK';
        $this->token = '6KA4BFRZN4EXRUBW63TF';
        $this->id = '8545398517';
        $this->event = eden('eventbrite')
        ->event($this->token);
    }

    public function testCopy()
    {
        // $copied = $this->event->copy($this->id, 'copied event this 2');

        // $this->assertTrue(is_array($copied));
        // $this->assertArrayHasKey('process', $copied);
        // $this->assertArrayHasKey('status', $copied['process']);
        // $this->assertTrue($copied['process']['status'] == 'OK');
    }

    public function testGetAttendees()
    {
        // $attendees = $this->event->getAttendees($this->id, 50, 1);

        // $this->assertTrue(is_array($attendees));
        // $this->assertArrayHasKey('attendees', $attendees);
    }

    public function testGetDetail()
    {
        // $event = $this->event->getDetail($this->id);

        // $this->assertTrue(is_array($event));
        // $this->assertArrayHasKey('event', $event);
    }

    public function testGetDiscounts()
    {
        // $discounts = $this->event->getDiscounts($this->id);

        // $this->assertTrue(is_array($discounts));
        // $this->assertArrayHasKey('discounts', $discounts);
    }

    public function testSearch()
    {
        $search = $this->event->search();
        $this->assertInstanceOf('Eden\\Eventbrite\\Event\\Search', $search);
    }

    public function testSet()
    {
        $set = $this->event->set();
        $this->assertInstanceOf('Eden\\Eventbrite\\Event\\Set', $set);
    }
}
