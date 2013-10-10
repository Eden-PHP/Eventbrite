<?php

namespace Eden\Eventbrite\Tests\Eventbrite;

class Payment extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->eventId = '8545398517';
        $this->responseKey = '3TBXH4JTITJUHEMARNAK';
        $this->token = '6KA4BFRZN4EXRUBW63TF';
        $this->googleMerchantId = 'googleMerchantId';
        $this->googleMerchantKey = 'googleMerchantKey';
        $this->paypalEmail = 'dummyemail@email.com';
        $this->payment = eden('eventbrite')
            ->payment($this->token);
    }

    public function testAcceptCheck()
    {
        $payment = $this->payment
            ->acceptCheck();

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('accept_check' => 1),
            'query',
            $payment
        );
    }

    public function testAcceptGoogle()
    {
        $payment = $this->payment
            ->acceptGoogle();

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('accept_google' => 1),
            'query',
            $payment
        );
    }

    public function testAcceptInvoice()
    {
        $payment = $this->payment
            ->acceptInvoice();

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('accept_invoice' => 1),
            'query',
            $payment
        );
    }

    public function testAcceptPaypal()
    {
        $payment = $this->payment
            ->acceptPaypal();

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('accept_paypal' => 1),
            'query',
            $payment
        );
    }

    public function testSetCashInstructions()
    {
        $instructions = 'The quick brown fox jumps over the lazy dog.';
        $payment = $this->payment
            ->setCashInstructions($instructions);

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('instructions_cash' => $instructions),
            'query',
            $payment
        );
    }

    public function testSetCheckInstructions()
    {
        $instructions = 'The quick brown fox jumps over the lazy dog.';
        $payment = $this->payment
            ->setCheckInstructions($instructions);

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('instructions_check' => $instructions),
            'query',
            $payment
        );
    }

    public function testSetInvoiceInstructions()
    {
        $instructions = 'The quick brown fox jumps over the lazy dog.';
        $payment = $this->payment
            ->setInvoiceInstructions($instructions);

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('instructions_invoice' => $instructions),
            'query',
            $payment
        );
    }

    public function testSetEvent()
    {
        $payment = $this->payment->setEvent($this->eventId);

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('event_id' => $this->eventId),
            'query',
            $payment
        );
    }

    public function testSetGoogleMerchantId()
    {
        $payment = $this->payment->setGoogleMerchantId(
            $this->googleMerchantId
        );

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('google_merchant_id' => $this->googleMerchantId),
            'query',
            $payment
        );
    }

    public function testSetGoogleMerchantKey()
    {
        $payment = $this->payment->setGoogleMerchantKey(
            $this->googleMerchantKey
        );

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('google_merchant_key' => $this->googleMerchantKey),
            'query',
            $payment
        );
    }


    public function testSetPaypalEmail()
    {
        $payment = $this->payment->setPaypalEmail($this->paypalEmail);

        $this->assertInstanceOf('Eden\Eventbrite\Payment', $payment);
        $this->assertAttributeEquals(
            array('paypal_email' => $this->paypalEmail),
            'query',
            $payment
        );
    }

    public function testUpdate()
    {
        // $instructions = 'The quick brown fox jumps over the lazy dog.';

        // $payment = $this->payment
        //     ->setEvent($this->eventId)
        //     ->acceptCash()
        //     ->acceptCheck()
        //     ->acceptGoogle()
        //     ->acceptInvoice()
        //     ->acceptPaypal()
        //     ->setCashInstructions($instructions)
        //     ->setCheckInstructions($instructions)
        //     ->setInvoiceInstructions($instructions)
        //     ->setGoogleMerchantId($this->googleMerchantId)
        //     ->setGoogleMerchantKey($this->googleMerchantKey)
        //     ->setPaypalEmail($this->paypalEmail)
        //     ->update();

        // $this->assertArrayHasKey('process', $payment);
        // $this->assertArrayHasKey('status', $payment['process']);
        // $this->assertTrue($payment['process']['status'] == 'OK');
    }
}
