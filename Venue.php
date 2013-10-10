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
 * Eventbrite venue
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Venue extends Base
{
    const URL_NEW = 'https://www.eventbrite.com/json/venue_new';
    const URL_UPDATE = 'https://www.eventbrite.com/json/venue_update';

    protected $query = array();

    /**
     * Sets token or user and api
     *
     * @param string $user
     * @param string|bool|null $api
     * @return void
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
     * set id in query
     *
     * @param int
     * @return Eden\Eventbrite\Venue
     */
    public function setId($id)
    {
        //Argument 1 must be an int
        Argument::i()->test(1, 'int');

        $this->query['id'] = $id;

        return $this;
    }

    /**
     * set organizer id in query
     *
     * @param int
     * @return Eden\Eventbrite\Venue
     */
    public function setOrganizerId($organizerId)
    {
        //Argument 1 must be an int
        Argument::i()->test(1, 'int');

        $this->query['organizer_id'] = $organizerId;

        return $this;
    }

    /**
     * set name in query
     *
     * @param string
     * @return Eden\Eventbrite\Venue
     */
    public function setName($name)
    {
        //Argument 1 must be an string
        Argument::i()->test(1, 'string');

        $this->query['name'] = $name;

        return $this;
    }

    /**
     * set name in query
     *
     * @param string
     * @return Eden\Eventbrite\Venue
     */
    public function setAddress($address)
    {
        //Argument 1 must be an string
        Argument::i()->test(1, 'string');

        $this->query['address'] = $address;

        return $this;
    }

    /**
     * set address_2 in query
     *
     * @param string
     * @return Eden\Eventbrite\Venue
     */
    public function setAddress2($address2)
    {
        //Argument 1 must be an string
        Argument::i()->test(1, 'string');

        $this->query['address_2'] = $address2;

        return $this;
    }

    /**
     * set city in query
     *
     * @param string
     * @return Eden\Eventbrite\Venue
     */
    public function setCity($city)
    {
        //Argument 1 must be an string
        Argument::i()->test(1, 'string');

        $this->query['city'] = $city;

        return $this;
    }

    /**
     * set region in query
     *
     * @param string
     * @return Eden\Eventbrite\Venue
     */
    public function setRegion($region)
    {
        //Argument 1 must be an string
        Argument::i()->test(1, 'string');

        $this->query['region'] = $region;

        return $this;
    }

    /**
     * set postal code in query
     *
     * @param string
     * @return Eden\Eventbrite\Venue
     */
    public function setPostalCode($postalCode)
    {
        //Argument 1 must be an string
        Argument::i()->test(1, 'string');

        $this->query['postal_code'] = $postalCode;

        return $this;
    }

    /**
     * set country_code in query
     *
     * @param string
     * @return Eden\Eventbrite\Venue
     */
    public function setCountryCode($countryCode)
    {
        //Argument 1 must be an string
        Argument::i()->test(1, 'string');

        $this->query['country_code'] = $countryCode;

        return $this;
    }

    /**
     * Creates the venue
     *
     * @return array
     */
    public function create()
    {
        if (!isset($this->query['organizer_id'])) {
            Exception::i()
                ->setMessage(Exception::ORGANIZER_ORGANIZER_ID_NOT_SET)
                ->trigger();
        }

        if (!isset($this->query['name'])) {
            Exception::i()
                ->setMessage(Exception::ORGANIZER_NAME_NOT_SET)
                ->trigger();
        }

        if (!isset($this->query['country_code'])) {
            Exception::i()
                ->setMessage(Exception::ORGANIZER_COUNTRY_CODE_NOT_SET)
                ->trigger();
        }

        return $this->getJsonResponse(self::URL_NEW, $this->query);
    }


    /**
     * Updates the venue
     *
     * @return array
     */
    public function update()
    {
        if (!isset($this->query['id'])) {
            Exception::i()
                ->setMessage(Exception::ORGANIZER_ID_NOT_SET)
                ->trigger();
        }

        return $this->getJsonResponse(self::URL_UPDATE, $this->query);
    }
}
