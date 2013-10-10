<?php //-->
/*
 * This file is part of the Eventbrite package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Eventbrite;

/**
 * Eventbrite payment
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Payment extends Base
{
    const URL = 'https://www.eventbrite.com/json/payment_update';

    protected $query = array();

    /**
     * Sets token or user and api
     *
     * @param string $user
     * @param string|bool|null $api
     * @return  void
     */
    public function __construct($user, $api = false)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        $this->api = $api;
        $this->user = $user;
    }

    /**
     * Accept cash
     *
     * @return Eden\Eventbrite\Payment
     */
    public function acceptCash()
    {
        $this->query['accept_check'] = 1;

        return $this;
    }

    /**
     * Accept check
     *
     * @return Eden\Eventbrite\Payment
     */
    public function acceptCheck()
    {
        $this->query['accept_check'] = 1;

        return $this;
    }

    /**
     * Accept Google Checkout
     *
     * @return Eden\Eventbrite\Payment
     */
    public function acceptGoogle()
    {
        $this->query['accept_google'] = 1;

        return $this;
    }

    /**
     * Accept invoice
     *
     * @return Eden\Eventbrite\Payment
     */
    public function acceptInvoice()
    {
        $this->query['accept_invoice'] = 1;

        return $this;
    }

    /**
     * Accept PayPal
     *
     * @return Eden\Eventbrite\Payment
     */
    public function acceptPaypal()
    {
        $this->query['accept_paypal'] = 1;

        return $this;
    }

    /**
     * Set cash instructions
     *
     * @param string
     * @return Eden\Eventbrite\Payment
     */
    public function setCashInstructions($instructions)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['instructions_cash'] = $instructions;

        return $this;
    }

    /**
     * Set check instructions
     *
     * @param string
     * @return Eden\Eventbrite\Payment
     */
    public function setCheckInstructions($instructions)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['instructions_check'] = $instructions;

        return $this;
    }

    /**
     * Set event ID
     *
     * @param int
     * @return Eden\Eventbrite\Payment
     */
    public function setEvent($id)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'int');

        $this->query['event_id'] = $id;

        return $this;
    }

    /**
     * Set your google merchant ID
     *
     * @param string
     * @return Eden\Eventbrite\Payment
     */
    public function setGoogleMerchantId($id)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['google_merchant_id'] = $id;

        return $this;
    }

    /**
     * Set google merchant key
     *
     * @param string
     * @return Eden\Eventbrite\Payment
     */
    public function setGoogleMerchantKey($key)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['google_merchant_key'] = $key;

        return $this;
    }

    /**
     * Set invoice instructions
     *
     * @param string
     * @return Eden\Eventbrite\Payment
     */
    public function setInvoiceInstructions($instructions)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['instructions_invoice'] = $instructions;

        return $this;
    }

    /**
     * Accept PayPal Email
     *
     * @param string
     * @return Eden\Eventbrite\Payment
     */
    public function setPaypalEmail($email)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['paypal_email'] = $email;

        return $this;
    }

    /**
     * Send update
     *
     * @return array
     */
    public function update()
    {
        return $this->getJsonResponse(self::URL, $this->query);
    }
}
