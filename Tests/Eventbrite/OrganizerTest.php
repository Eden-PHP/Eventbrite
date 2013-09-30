<?php

namespace Eden\Eventbrite\Tests\Eventbrite;

class Organizer extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->eventId = '8545398517';
        $this->responseKey = '3TBXH4JTITJUHEMARNAK';
        $this->token = '6KA4BFRZN4EXRUBW63TF';
        $this->organizerId = '4747518619';
        $this->organizer = eden('eventbrite')
            ->organizer($this->token);
    }

    public function testCreate()
    {
        // $organizer = $this->organizer->create(
        //     'organizer 002',
        //     'organizer two for testing'
        // );

        // $this->assertArrayHasKey('process', $organizer);
        // $this->assertArrayHasKey('status', $organizer['process']);
        // $this->assertTrue($organizer['process']['status'] == 'OK');
    }

    public function testGetEvents()
    {
        // $events = $this->organizer->getEvents($this->organizerId);
        // $this->assertArrayHasKey('events', $events);
    }

    public function testUpdate()
    {
        // $organizer = $this->organizer->update(
        //     $this->organizerId,
        //     'New Name',
        //     'Updated Name');

        // $this->assertArrayHasKey('process', $organizer);
        // $this->assertArrayHasKey('status', $organizer['process']);
        // $this->assertTrue($organizer['process']['status'] == 'OK');
    }
}
