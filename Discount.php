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
 * Eventbrite new or update discount
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Discount extends Base
{
    const INSTANCE = 0;
    const URL_NEW = 'https://www.eventbrite.com/json/discount_new';
    const URL_UPDATE = 'https://www.eventbrite.com/json/discount_update';

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
     * Creates the discount
     *
     * @param int the event id
     * @return array
     */
    public function create($event)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'int');

        $query = $this->query;
        $query['event_id'] = $event;

        return $this->getJsonResponse(self::URL_NEW, $query);
    }

    /**
     * Sets the discount amount
     *
     * @param float|int
     * @return Eden\Evenbrite\Discount
     */
    public function setAmountOff($amount)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'float', 'int');

        $this->query['amount_off'] = $amount;

        return $this;
    }

    /**
     * Sets the discount code
     *
     * @param string
     * @return Eden\Evenbrite\Discount
     */
    public function setCode($code)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'string');

        $this->query['code'] = $code;

        return $this;
    }

    /**
     * Set the end time
     *
     * @param string|int
     * @return Eden\Evenbrite\Discount
     */
    public function setEnd($end)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string', 'int');

        if (is_string($end)) {
            $end = strtotime($end);
        }

        $end = date('Y-m-d H:i:s', $end);

        $this->query['end_date'] = $end;

        return $this;
    }

    /**
     * Sets the discount percent
     *
     * @param float|int
     * @return Eden\Evenbrite\Discount
     */
    public function setPercentOff($percent)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'int', 'float');

        $this->query['percent_off'] = $percent;

        return $this;
    }

    /**
     * Set quantity
     *
     * @param int
     * @return Eden\Evenbrite\Discount
     */
    public function setQuantity($quantity)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'int');

        $this->query['quantity_available'] = $quantity;

        return $this;
    }

    /**
     * Set the start time
     *
     * @param int|string
     * @return Eden\Evenbrite\Discount
     */
    public function setStart($start)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string', 'int');

        if (is_string($start)) {
            $start = strtotime($start);
        }

        $start = date('Y-m-d H:i:s', $start);

        $this->query['start_date'] = $start;

        return $this;
    }

    /**
     * Set ticket ID or a list of ticket IDs
     *
     * @param string|array
     * @return Eden\Evenbrite\Discount
     */
    public function setTickets($tickets)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'string', 'array');

        if (is_array($tickets)) {
            $tickets = implode(',', $tickets);
        }

        $this->query['tickets'] = $tickets;

        return $this;
    }

    /**
     * Creates the discount
     *
     * @param int the discount id
     * @return array
     */
    public function update($id)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'int');

        $query = $this->query;
        $query['id'] = $id;

        return $this->getJsonResponse(self::URL_UPDATE, $query);
    }
}
