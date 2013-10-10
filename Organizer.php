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
 * Eventbrite Organizer
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Organizer extends Base
{
    const URL_NEW = 'https://www.eventbrite.com/json/organizer_new';
    const URL_UPDATE = 'https://www.eventbrite.com/json/organizer_update';
    const URL_EVENTS = 'https://www.eventbrite.com/json/organizer_list_events';

    /**
     * Sets token or user and api
     *
     * @param string $user
     * @param string $api
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
     * Creates an organizer
     *
     * @param string
     * @param string|null
     * @return array
     */
    public function create($name, $description = null)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string', 'null');

        $query = array(
            'name'  => $name,
            'description' => $description);

        return $this->getJsonResponse(self::URL_NEW, $query);
    }

    /**
     * Returns all active organizer events
     *
     * @param int
     * @return array
     */
    public function getEvents($id)
    {
        //Argument 1 must be an int
        Argument::i()->test(1, 'int');

        $query = array('id' => $id);

        return $this->getJsonResponse(self::URL_EVENTS, $query);
    }

    /**
     * Updates an organizer
     *
     * @param int
     * @param string
     * @param string|null
     * @return array
     */
    public function update($id, $name, $description = null)
    {
        //Argument Test
        Argument::i()
            //Argument 1 must be an integer
            ->test(1, 'int')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string', 'null');

        $query = array(
            'id' => $id,
            'name' => $name,
            'description' => $description);

        return $this->getJsonResponse(self::URL_UPDATE, $query);
    }
}
