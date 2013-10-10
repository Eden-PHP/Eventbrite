<?php //-->
/*
 * This file is part of the Eventbrite package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Eventbrite\Event;

use Eden\Eventbrite\Base as EventbriteBase;
use Eden\Eventbrite\Argument as Argument;

/**
 * Eventbrite search
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Search extends EventbriteBase
{
    const URL = 'https://www.eventbrite.com/json/event_search';

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
     * Only return the number of results found
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function countOnly()
    {
        $this->query['count_only'] = 'true';

        return $this;
    }

    /**
     * Retrieves response
     *
     * @return array
     */
    public function send()
    {
        return $this->getJsonResponse(self::URL, $this->query);
    }

    /**
     * Filters by address
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setAddress($address)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['address'] = $address;

        return $this;
    }

    /**
     * Filters by categories
     *
     * @param string|array
     * @return Eden\Eventbrite\Event\Search
     */
    public function setCategory($category)
    {
        //Argument 1 must be a string or array
        Argument::i()->test(1, 'string', 'array');

        if (is_array($category)) {
            $category = implode(',', $category);
        }

        $this->query['category'] = $category;

        return $this;
    }

    /**
     * Filters by country
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setCountry($country)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['country'] = $country;

        return $this;
    }

    /**
     * Filters by city
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setCity($city)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['city'] = $city;

        return $this;
    }

    /**
     * Filters by event date. Limit the list of results to a
     * date range, specified by a label or by exact dates.
     * Currently supported labels include: All, Future,
     * Past, Today, Yesterday, Last Week, This Week,
     * Next week, This Month, Next Month and months by
     * name like October. Exact date ranges take the
     * form 2008-04-25 2008-04-27.
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setDate($date)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['date'] = $date;

        return $this;
    }

    /**
     * Filters by when the event was created. Limit the
     * list of results to a date range, specified by a
     * label or by exact dates. Currently supported
     * labels include: All, Future, Past, Today,
     * Yesterday, Last Week, This Week, Next week,
     * This Month, Next Month and months by name like
     * October. Exact date ranges take the form
     * 2008-04-25 2008-04-27.
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setDateCreated($date)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['date_created'] = $date;

        return $this;
    }

    /**
     * Filters by when the event was modified. Limit the
     * list of results to a date range, specified by a
     * label or by exact dates. Currently supported
     * labels include: All, Future, Past, Today,
     * Yesterday, Last Week, This Week, Next week,
     * This Month, Next Month and months by name like
     * October. Exact date ranges take the form
     * 2008-04-25 2008-04-27.
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setDateModified($date)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['date_modified'] = $date;

        return $this;
    }

    /**
     * Filters by keywords
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setKeywords($keywords)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['keywords'] = $keywords;

        return $this;
    }

    /**
     * Filters by latitude
     *
     * @param float
     * @return Eden\Eventbrite\Event\Search
     */
    public function setLatitude($latitude)
    {
        //Argument 1 must be a float
        Argument::i()->test(1, 'float');

        $this->query['latitude'] = $latitude;

        return $this;
    }

    /**
     * Filters by longitude
     *
     * @param float
     * @return Eden\Eventbrite\Event\Search
     */
    public function setLongitude($longitude)
    {
        //Argument 1 must be a float
        Argument::i()->test(1, 'float');

        $this->query['longitude'] = $longitude;

        return $this;
    }

    /**
     * Set number of results
     *
     * @param int
     * @return Eden\Eventbrite\Event\Search
     */
    public function setMax($max)
    {
        //Argument 1 must be a int
        Argument::i()->test(1, 'int');

        if ($max > 100) {
            $max = 100;
        }

        $this->query['max'] = $max;

        return $this;
    }

    /**
     * Filters by organizer
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setOrganizer($organizer)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['organizer'] = $organizer;

        return $this;
    }

    /**
     * Filters by postal/zip code
     *
     * @param string|int
     * @return Eden\Eventbrite\Event\Search
     */
    public function setPostal($postal)
    {
        //Argument 1 must be a string or integer
        Argument::i()->test(1, 'string', 'int');

        $this->query['postal_code'] = $postal;

        return $this;
    }

    /**
     * Filters by region
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setRegion($region)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['region'] = $region;

        return $this;
    }

    /**
     * Filters within a specified area
     *
     * @param int
     * @return Eden\Eventbrite\Event\Search
     */
    public function setWithin($within)
    {
        //Argument 1 must be a int
        Argument::i()->test(1, 'int');

        $this->query['within'] = $within;

        return $this;
    }

    /**
     * Filters within an area unit
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setWithinUnit($unit)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['within_unit'] = $unit;

        return $this;
    }

    /**
     * Sort by city
     *
     * @return Eden\Eventbrite\Event\Search
     */
    public function sortByCity()
    {
        $this->query['sort_by'] = 'city';

        return $this;
    }

    /**
     * Sort by event date
     *
     * @return Eden\Eventbrite\Event\Search
     */
    public function sortByDate()
    {
        $this->query['sort_by'] = 'date';

        return $this;
    }

    /**
     * Sort by event id
     *
     * @return Eden\Eventbrite\Event\Search
     */
    public function sortById()
    {
        $this->query['sort_by'] = 'id';

        return $this;
    }

    /**
     * Sort by event name
     *
     * @return Eden\Eventbrite\Event\Search
     */
    public function sortByName()
    {
        $this->query['sort_by'] = 'name';

        return $this;
    }

    /**
     * Set pagination
     *
     * @param int
     * @return Eden\Eventbrite\Event\Search
     */
    public function setPage($page)
    {
        //Argument 1 must be a int
        Argument::i()->test(1, 'int');

        $this->query['page'] = $page;

        return $this;
    }

    /**
     * Filter by event ids greater than specified
     *
     * @param int
     * @return Eden\Eventbrite\Event\Search
     */
    public function setSince($since)
    {
        //Argument 1 must be a int
        Argument::i()->test(1, 'int');

        $this->query['since_id'] = $since;

        return $this;
    }

    /**
     * Sets a tracking link
     *
     * @param string
     * @return Eden\Eventbrite\Event\Search
     */
    public function setTracking($tracking)
    {
        //Argument 1 must be a string
        Argument::i()->test(1, 'string');

        $this->query['tracking_link'] = $tracking;

        return $this;
    }
}
