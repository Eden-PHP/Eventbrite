<?php //-->
/*
 * This file is part of the Core package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Eventbrite\Event;

use Eden\Eventbrite\Base as EventbriteBase;
use Eden\Eventbrite\Argument as Argument;

/**
 * Eventbrite new or update event
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Set extends EventbriteBase
{
    const URL_NEW       = 'https://www.eventbrite.com/json/event_new';
    const URL_UPDATE    = 'https://www.eventbrite.com/json/event_update';

    const DRAFT = 'draft';
    const LIVE  = 'live';

    protected $query = array();

    /**
     * Sets token or user and api
     * @param string  $user
     * @param string $api
     *
     * @return  void
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
     * Set event to private
     *
     * @return Eden\Eventbrite\Event\Set
     */
    public function isPrivate()
    {
        $this->query['privacy'] = 0;

        return $this;
    }

    /**
     * Set the event to public
     *
     * @return Eden\Eventbrite\Event\Set
     */
    public function isPublic()
    {
        $this->query['privacy'] = 1;

        return $this;
    }

    /**
     * Sends event off to be created
     *
     * @return Array
     */
    public function create()
    {
        if (!isset($this->query['title'])) {
            Exception::i()->setMessage(Exception::TITLE_NOT_SET)->trigger();
        }

        if (!isset($this->query['start_date'])) {
            Exception::i()->setMessage(Exception::START_NOT_SET)->trigger();
        }


        if (!isset($this->query['end_date'])) {
            Exception::i()->setMessage(Exception::END_NOT_SET)->trigger();
        }

        if (!isset($this->query['timezone'])) {
            Exception::i()->setMessage(Exception::ZONE_NOT_SET)->trigger();
        }

        return $this->getJsonResponse(self::URL_NEW, $this->query);
    }

    /**
     * Sends event off to be updated
     *
     * @return Array
     */
    public function update()
    {
        if (!isset($this->query['title'])) {
            Exception::i()->setMessage(Exception::TITLE_NOT_SET)->trigger();
        }

        if (!isset($this->query['start_date'])) {
            Exception::i()->setMessage(Exception::START_NOT_SET)->trigger();
        }


        if (!isset($this->query['end_date'])) {
            Exception::i()->setMessage(Exception::END_NOT_SET)->trigger();
        }

        if (!isset($this->query['timezone'])) {
            Exception::i()->setMessage(Exception::ZONE_NOT_SET)->trigger();
        }

        if (!isset($this->query['privacy'])) {
            Exception::i()->setMessage(Exception::PRIVACY_NOT_SET)->trigger();
        }

        if (!isset($this->query['personalized_url'])) {
            Exception::i()->setMessage(Exception::URL_NOT_SET)->trigger();
        }

        if (!isset($this->query['organizer_id'])) {
            Exception::i()->setMessage(Exception::ORGANIZER_NOT_SET)->trigger();
        }

        if (!isset($this->query['venue_id'])) {
            Exception::i()->setMessage(Exception::VENUE_NOT_SET)->trigger();
        }

        if (!isset($this->query['capacity'])) {
            Exception::i()->setMessage(Exception::CAPACITY_NOT_SET)->trigger();
        }

        if (!isset($this->query['currency'])) {
            Exception::i()->setMessage(Exception::CURRENCY_NOT_SET)->trigger();
        }

        return $this->getJsonResponse(self::URL_UPDATE, $this->query);
    }

    /**
     * Set the background color
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setBackground($color)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'hex');

        $this->query['background_color'] = $color;

        return $this;
    }

    /**
     * Sets the border color
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setBorderColor($color)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'hex');

        $this->query['box_border_color'] = $color;

        return $this;
    }

    /**
     * Set the box background color
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setBoxBackground($color)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'hex');

        $this->query['box_background_color'] = $color;

        return $this;
    }

    /**
     * Sets the box color
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setBoxColor($color)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'hex');

        $this->query['box_text_color'] = $color;

        return $this;
    }

    /**
     * Set the event capacity
     *
     * @param int
     * @return Eden\Eventbrite\Event\Set
     */
    public function setCapacity($capacity)
    {
        //Argument 1 must be a int
        Argument::i()->test(1, 'int');

        $this->query['capacity'] = $capacity;

        return $this;
    }

    /**
     * Sets currency
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setCurrency($currency)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['currency'] = $currency;

        return $this;
    }

    /**
     * Set the description
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setDescription($description)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['description'] = $description;

        return $this;
    }

    /**
     * Sets status to draft
     *
     * @return Eden\Eventbrite\Event\Set
     */
    public function setDraft()
    {
        $this->query['status'] = self::DRAFT;

        return $this;
    }

    /**
     * Set the end time
     *
     * @param string|int
     * @return Eden\Eventbrite\Event\Set
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
     * Set the footer HTML
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setFooter($html)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['custom_footer'] = $html;

        return $this;
    }

    /**
     * Set the header HTML
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setHeader($html)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['custom_header'] = $html;

        return $this;
    }

    /**
     * Sets the header background color
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setHeaderBackground($color)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'hex');

        $this->query['box_header_background_color'] = $color;

        return $this;
    }

    /**
     * Sets color to Hexdecimal
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setHeaderColor($color)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'hex');

        $this->query['box_header_text_color'] = $color;

        return $this;
    }

    /**
     * Set the event ID. Set this if you want to
     * perform an update instead of an insert
     *
     * @param int
     * @return Eden\Eventbrite\Event\Set
     */
    public function setId($id)
    {
        //Argument 1 must be int
        Argument::i()->test(1, 'int');

        $this->query['event_id'] = $id;

        return $this;
    }

    /**
     * Set the link color
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setLinkColor($color)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'hex');

        $this->query['link_color'] = $color;

        return $this;
    }

    /**
     * Sets status to live
     *
     * @return Eden\Eventbrite\Event\Set
     */
    public function setLive()
    {
        $this->query['status'] = self::LIVE;

        return $this;
    }

    /**
     * Set the organizer ID
     *
     * @param int
     * @return Eden\Eventbrite\Event\Set
     */
    public function setOrganizer($organizer)
    {
        //Argument 1 must be a numeric
        Argument::i()->test(1, 'int');

        $this->query['organizer_id'] = $organizer;

        return $this;
    }

    /**
     * Set the start time
     *
     * @param int|string
     * @return Eden\Eventbrite\Event\Set
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
     * Set the text color
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setTextColor($color)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'hex');

        $this->query['text_color'] = $color;

        return $this;
    }

    /**
     * Set the timezone in GMT format ie. GMT+01
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setTimezone($zone)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'gmt');

        $this->query['timezone'] = $zone;

        return $this;
    }

    /**
     * Set the title
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setTitle($title)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['title'] = $title;

        return $this;
    }

    /**
     * Set the title color
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setTitleColor($color)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'hex');

        $this->query['title_text_color'] = $color;

        return $this;
    }

    /**
     * Set event URL
     *
     * @param string
     * @return Eden\Eventbrite\Event\Set
     */
    public function setUrl($url)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'url');

        $this->query['personalized_url'] = $url;

        return $this;
    }

    /**
     *
     *
     * @param int
     * @return Eden\Eventbrite\Event\Set
     */
    public function setVenue($venue)
    {
        //Argument 1 must be a numeric
        Argument::i()->test(1, 'numeric');

        $this->query['venue_id'] = $venue;

        return $this;
    }
}
