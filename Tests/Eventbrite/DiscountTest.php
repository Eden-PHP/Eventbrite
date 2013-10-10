<?php

namespace Eden\Eventbrite\Tests\Eventbrite;

class DiscountTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->eventId = '8545398517';
        $this->responseKey = '3TBXH4JTITJUHEMARNAK';
        $this->token = '6KA4BFRZN4EXRUBW63TF';
        $this->discount = eden('eventbrite')
            ->discount($this->token);
    }

    public function testCreate()
    {
        // $discount = $this->discount
        //     ->setCode('SOMERANDOMOQK')
        //     ->setAmountOff(100)
        //     ->create($this->eventId);

        // $this->assertArrayHasKey('process', $discount);
        // $this->assertArrayHasKey('status', $discount['process']);
        // $this->assertTrue($discount['process']['status'] == 'OK');
    }

    public function testSetAmountOff()
    {
        $amount = 100;
        $discount = $this->discount->setAmountOff($amount);

        $this->assertInstanceOf('Eden\Eventbrite\Discount', $discount);
        $this->assertAttributeEquals(
            array('amount_off' => $amount),
            'query',
            $discount
        );
    }

    public function testSetCode()
    {
        $code = 'AKWRLA';
        $discount = $this->discount->setCode($code);

        $this->assertInstanceOf('Eden\Eventbrite\Discount', $discount);
        $this->assertAttributeEquals(
            array('code' => $code),
            'query',
            $discount
        );
    }

    public function testSetEnd()
    {
        $endDate = '2013-02-01 00:00:00';
        $discount = $this->discount->setEnd($endDate);

        $this->assertInstanceOf('Eden\Eventbrite\Discount', $discount);
        $this->assertAttributeEquals(
            array('end_date' => $endDate),
            'query',
            $discount
        );
    }

    public function testSetPercentOff()
    {
        $percent = 100;
        $discount = $this->discount->setPercentOff($percent);

        $this->assertInstanceOf('Eden\Eventbrite\Discount', $discount);
        $this->assertAttributeEquals(
            array('percent_off' => $percent),
            'query',
            $discount
        );
    }

    public function testSetQuantity()
    {
        $quantity = 100;
        $discount = $this->discount->setQuantity($quantity);

        $this->assertInstanceOf('Eden\Eventbrite\Discount', $discount);
        $this->assertAttributeEquals(
            array('quantity_available' => $quantity),
            'query',
            $discount
        );
    }

    public function testSetStart()
    {
        $startDate = '2013-01-01 00:00:01';
        $discount = $this->discount->setStart($startDate);

        $this->assertInstanceOf('Eden\Eventbrite\Discount', $discount);
        $this->assertAttributeEquals(
            array('start_date' => $startDate),
            'query',
            $discount
        );
    }

    public function testSetTickets()
    {
        $tickets = '00001, 00002, 00003';
        $discount = $this->discount->setTickets($tickets);

        $this->assertInstanceOf('Eden\Eventbrite\Discount', $discount);
        $this->assertAttributeEquals(
            array('tickets' => $tickets),
            'query',
            $discount
        );
    }

    public function testUpdate()
    {
        // $discount = $this->discount
        //     ->setCode('CODEUPDATED')
        //     ->update('35989237');
        // $this->assertArrayHasKey('process', $discount);
        // $this->assertArrayHasKey('status', $discount['process']);
        // $this->assertTrue($discount['process']['status'] == 'OK');
    }
}
