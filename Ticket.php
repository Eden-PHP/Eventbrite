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
 * Eventbrite ticketing
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Ticket extends Base
{
    const URL_NEW = 'https://www.eventbrite.com/json/ticket_new';
    const URL_UPDATE = 'https://www.eventbrite.com/json/ticket_update';

    protected $query = array();

    /**
     * Sets token or user and api
     *
     * @param string $user
     * @param string $api
     * @return void
     */
    public function __construct($user, $api = false)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'null');

        $this->api = $api;
        $this->user = $user;
    }

    /**
     * Creates the ticket
     *
     * @return array
     */
    public function create()
    {
        if (!isset($this->query['event_id'])) {
            Exception::i()->setMessage(Exception::EVENT_NOT_SET)->trigger();
        }

        if (!isset($this->query['name'])) {
            Exception::i()->setMessage(Exception::NAME_NOT_SET)->trigger();
        }

        if (!isset($this->query['price'])) {
            Exception::i()->setMessage(Exception::PRICE_NOT_SET)->trigger();
        }

        if (!isset($this->query['quantity'])) {
            Exception::i()->setMessage(Exception::QUANTITY_NOT_SET)->trigger();
        }

        $query = $this->query;
        if (isset($query['hide'])) {
            unset($query['hide']);
        }

        return $this->getJsonResponse(self::URL_NEW, $query);
    }

    /**
     * Set the description
     *
     * @param string
     * @return Eden\Eventbrite\Ticket
     */
    public function setDescription($description)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['description'] = $description;

        return $this;
    }

    /**
     * Accept donations
     *
     * @param bool
     * @return Eden\Eventbrite\Ticket
     */
    public function setDonation($type = true)
    {
        //Argument 1 must be a boolean
        Argument::i()->test(1, 'bool', 'int');

        if (is_numeric($type)) {
            $type = (bool) $type;
        }

        $donation = 1;
        if (!$type) {
            $donation = 0;
        }

        $this->query['is_donation'] = $donation;

        return $this;
    }

    /**
     * Set the end time
     *
     * @param string|int
     * @return Eden\Eventbrite\Ticket
     */
    public function setEnd($end)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string', 'int');

        if (is_string($end)) {
            $end = strtotime($end);
        }

        $end = date('Y-m-d H:i:s', $end);

        $this->query['end_sales'] = $end;

        return $this;
    }

    /**
     * Set event ID
     *
     * @param int
     * @return Eden\Eventbrite\Ticket
     */
    public function setEvent($id)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'int');

        $this->query['event_id'] = $id;

        return $this;
    }

    /**
     * Include Eventbrite's fee on top of the ticket fee
     *
     * @return Eden\Eventbrite\Ticket
     */
    public function setFee()
    {
        $this->query['include_fee'] = 1;

        return $this;
    }

    /**
     * If true, will hide the ticket type
     *
     * @param bool
     * @return Eden\Eventbrite\Ticket
     */
    public function setHide($hide)
    {
        //Argument 1 must be a boolean
        Argument::i()->test(1, 'bool');

        //if the string hide is show
        if ($hide) {
            //hide is equal to yes
            $this->query['hide'] = 'y';
        } else if ($hide ===  false) {
            //hide is equal to no
            $this->query['hide'] = 'n';
        }

        return $this;
    }

    /**
     * Set Ticket ID
     *
     * @param int
     * @return Eden\Eventbrite\Ticket
     */
    public function setId($ticketId)
    {
         //Argument 1 must be int
        Argument::i()->test(1, 'int');

        $this->query['id'] = $ticketId;

        return $this;
    }

    /**
     * Set the maximum number of tickets per order
     *
     * @param int
     * @return Eden\Eventbrite\Ticket
     */
    public function setMax($max)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');

        if ($max < 1) {
            $max = 1;
        }

        $this->query['max'] = $max;

        return $this;
    }

    /**
     * Set the minimum number of tickets per order
     *
     * @param int
     * @return Eden\Eventbrite\Ticket
     */
    public function setMin($min)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');

        if ($min < 0) {
            $min = 0;
        }
        $this->query['min'] = $min;

        return $this;
    }

    /**
     * Set ticket name
     *
     * @param string
     * @return Eden\Eventbrite\Ticket
     */
    public function setName($name)
    {
        //Argument 1 must be string
        Argument::i()->test(1, 'string');

        $this->query['name'] = $name;

        return $this;
    }

    /**
     * Set price
     *
     * @param float|int
     * @return Eden\Eventbrite\Ticket
     */
    public function setPrice($price)
    {
        //Argument 1 must be float or int
        Argument::i()->test(1, 'float', 'int');

        $this->query['price'] = $price;

        return $this;
    }

    /**
     * Set quantity
     *
     * @param int
     * @return Eden\Eventbrite\Ticket
     */
    public function setQuantity($quantity)
    {
        //Argument 1 must be an integer
        Argument::i()->test(1, 'int');

        $this->query['quantity'] = $quantity;

        return $this;
    }

    /**
     * Set the start time
     *
     * @param int|string
     * @return Eden\Eventbrite\Ticket
     */
    public function setStart($start)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string', 'int');

        if (is_string($start)) {
            $start = strtotime($start);
        }

        $start = date('Y-m-d H:i:s', $start);

        $this->query['start_sales'] = $start;

        return $this;
    }

    /**
     * Updates the ticket
     *
     * @return array
     */
    public function update()
    {
        if (!isset($this->query['id'])) {
            Exception::i()->setMessage(Exception::TICKET_ID_NOT_SET)->trigger();
        }

        if (!isset($this->query['name'])) {
            Exception::i()->setMessage(Exception::NAME_NOT_SET)->trigger();
        }

        if (!isset($this->query['price'])) {
            Exception::i()->setMessage(Exception::PRICE_NOT_SET)->trigger();
        }

        if (!isset($this->query['quantity'])) {
            Exception::i()->setMessage(Exception::QUANTITY_NOT_SET)->trigger();
        }

        return $this->getJsonResponse(self::URL_UPDATE, $this->query);
    }
}
