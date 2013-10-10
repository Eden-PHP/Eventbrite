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
 * Eventbrite event
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Event extends Base
{
    const URL_COPY = 'https://www.eventbrite.com/json/event_copy';
    const URL_GET = 'https://www.eventbrite.com/json/event_get';
    const URL_LIST_ATTENDEES  = 'https://www.eventbrite.com/json/event_list_attendees';
    const URL_LIST_DISCOUNTS = 'https://www.eventbrite.com/json/event_list_discounts';

    protected static $validDisplays = array('profile','answers','address');

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
     * Copies the event to a new one
     *
     * @param number
     * @param string
     * @return array
     */
    public function copy($id, $name)
    {
        //argument test
        Argument::i()
            //Argument 1 must be int
            ->test(1, 'int')
            //Argument 2 must be a string
            ->test(2, 'string');

        $query = array('id' => $id, 'event_name' => $name);

        return $this->getJsonResponse(self::URL_COPY, $query);
    }

    /**
     * Returns event attendees
     *
     * @param number
     * @param number
     * @param number
     * @param string|null
     * @param bool
     * @return array
     */
    public function getAttendees(
        $id,
        $count = 50,
        $page = 1,
        $display = null,
        $barcodes = false
    ) {
        //argument test
        $error = Argument::i()
            //Argument 1 must be int
            ->test(1, 'int')
            //Argument 2 must be int
            ->test(2, 'int')
            //Argument 3 must be int
            ->test(3, 'int')
            //Argument 4 must be a string
            ->test(4, 'string', 'null')
            //Argument 4 must be a boolean
            ->test(5, 'bool');

        $query = array('id' => $id, 'count' => $count, 'page' => $page);

        if (!is_null($display) && in_array($display, $this->validDisplays)) {
            $query['do_not_display'] = $display;
        }

        if ($barcodes) {
            $query['show_full_barcodes'] = $barcodes;
        }

        return $this->getJsonResponse(self::URL_LIST_ATTENDEES, $query);
    }

    /**
     * Returns the event details
     *
     * @param number
     * @return array
     */
    public function getDetail($id)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'int');

        $query = array('id' => $id);

        return $this->getJsonResponse(self::URL_GET, $query);
    }

    /**
     * Returns any event discounts
     *
     * @param number
     * @return array
     */
    public function getDiscounts($id)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'int');

        $query = array('id' => $id);

        return $this->getJsonResponse(self::URL_LIST_DISCOUNTS, $query);
    }

    /**
     * Returns the search class
     *
     * @return Eden\Eventbrite\Event\Search
     */
    public function search()
    {
        return Event\Search::i($this->user, $this->api);
    }

    /**
     * Returns the set class
     *
     * @return Eden\Eventbrite\Event\Set
     */
    public function set()
    {
        return Event\Set::i($this->user, $this->api);
    }
}
