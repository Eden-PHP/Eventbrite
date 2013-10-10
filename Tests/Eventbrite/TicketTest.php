<?php

namespace Eden\Eventbrite\Tests\Eventbrite;

class Ticket extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->eventId = '8545398517';
        $this->responseKey = '3TBXH4JTITJUHEMARNAK';
        $this->token = '6KA4BFRZN4EXRUBW63TF';
        $this->ticketId = '20983499';
        $this->ticket = eden('eventbrite')
            ->ticket($this->token);
    }

    public function testCreate()
    {
        // $id = $this->eventId;
        // $name = 'test ticket';
        // $price = 100;
        // $quantity = 100;
        // $description = 'The quick brown fox jumps over the lazy dog.';
        // $end = '2013-12-30 00:00:00';
        // $max = 10;
        // $min = 1;
        // $start = '2013-12-01 00:00:00';

        // $instructions = 'The quick brown fox jumps over the lazy dog.';
        // $ticket = $this->ticket
        //     ->setEvent($id)
        //     ->setName($name)
        //     ->setPrice($price)
        //     ->setQuantity($quantity)
        //     ->setDescription($description)
        //     ->setDonation()
        //     ->setEnd($end)
        //     ->setFee()
        //     ->setMax($max)
        //     ->setMin($min)
        //     ->setStart($start)
        //     ->create();

        // $this->assertArrayHasKey('process', $ticket);
        // $this->assertArrayHasKey('status', $ticket['process']);
        // $this->assertTrue($ticket['process']['status'] == 'OK');
    }

    public function testSetDescription()
    {
        $description = 'The quick brown fox jumps over the lazy dog.';
        $ticket = $this->ticket
            ->setDescription($description);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('description' => $description),
            'query',
            $ticket
        );
    }

    public function testSetDonation()
    {
        $donation = 0;
        $ticket = $this->ticket
            ->setDonation($donation);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);

        $this->assertAttributeEquals(
            array('is_donation' => $donation),
            'query',
            $ticket
        );
    }

    public function testSetEnd()
    {
        $endDate = '2013-02-01 00:00:00';
        $ticket = $this->ticket->setEnd($endDate);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('end_sales' => $endDate),
            'query',
            $ticket
        );
    }

    public function testSetEvent()
    {
        $eventId = $this->eventId;
        $ticket = $this->ticket
            ->setEvent($eventId);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('event_id' => $eventId),
            'query',
            $ticket
        );
    }

    public function testSetFee()
    {
        $fee = 1;
        $ticket = $this->ticket
            ->setFee($fee);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('include_fee' => $fee),
            'query',
            $ticket
        );
    }

    public function testSetHide()
    {
        $hide = true; // bool
        $ticket = $this->ticket
            ->setHide($hide);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);

        if ($hide) {
            $hide = 'y';
        } else {
            $hide = 'n';
        }

        $this->assertAttributeEquals(
            array('hide' => $hide),
            'query',
            $ticket
        );
    }

    public function testSetId()
    {
        $id = $this->ticketId;
        $ticket = $this->ticket
            ->setId($id);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('id' => $id),
            'query',
            $ticket
        );
    }

    public function testSetMax()
    {
        $max = 500;
        $ticket = $this->ticket
            ->setMax($max);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('max' => $max),
            'query',
            $ticket
        );
    }

    public function testSetMin()
    {
        $min = 1;
        $ticket = $this->ticket
            ->setMin($min);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('min' => $min),
            'query',
            $ticket
        );
    }

    public function testSetName()
    {
        $name = 'TicketOne';
        $ticket = $this->ticket
            ->setName($name);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('name' => $name),
            'query',
            $ticket
        );
    }

    public function testSetPrice()
    {
        $price = 1000.00; // int | float
        $ticket = $this->ticket
            ->setPrice($price);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('price' => $price),
            'query',
            $ticket
        );
    }

    public function testSetQuantity()
    {
        $quantity = 5; // int
        $ticket = $this->ticket
            ->setQuantity($quantity);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('quantity' => $quantity),
            'query',
            $ticket
        );
    }

    public function testSetStart()
    {
        $startDate = '2013-01-01 00:00:01';
        $ticket = $this->ticket->setStart($startDate);

        $this->assertInstanceOf('Eden\Eventbrite\Ticket', $ticket);
        $this->assertAttributeEquals(
            array('start_sales' => $startDate),
            'query',
            $ticket
        );
    }

    public function testUpdate()
    {
        // $id = $this->ticketId;
        // $name = 'test ticket updated';
        // $price = 100;
        // $quantity = 100;
        // $description = 'The quick brown fox jumps over the lazy dog.';
        // $end = '2013-12-30 00:00:00';
        // $max = 10;
        // $min = 1;
        // $start = '2013-12-01 00:00:00';

        // $instructions = 'The quick brown fox jumps over the lazy dog.';
        // $ticket = $this->ticket
        //     ->setId($id)
        //     ->setName($name)
        //     ->setPrice($price)
        //     ->setQuantity($quantity)
        //     ->setDescription($description)
        //     ->setDonation(0)
        //     ->setEnd($end)
        //     ->setFee()
        //     ->setMax($max)
        //     ->setMin($min)
        //     ->setStart($start)
        //     ->update();

        // $this->assertArrayHasKey('process', $ticket);
        // $this->assertArrayHasKey('status', $ticket['process']);
        // $this->assertTrue($ticket['process']['status'] == 'OK');
    }
}
