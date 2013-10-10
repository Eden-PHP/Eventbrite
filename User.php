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
 * Eventbrite user
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class User extends Base
{
    const URL_GET = 'https://www.eventbrite.com/json/user_get';
    const URL_LIST_EVENTS = 'https://www.eventbrite.com/json/user_list_events';
    const URL_LIST_ORGANIZERS = 'https://www.eventbrite.com/json/user_list_organizers';
    const URL_LIST_TICKETS = 'https://www.eventbrite.com/json/user_list_tickets';
    const URL_LIST_VENUES = 'https://www.eventbrite.com/json/user_list_venues';
    const URL_NEW = 'https://www.eventbrite.com/json/user_new';
    const URL_UPDATE = 'https://www.eventbrite.com/json/user_update';

    protected $query = array();
    protected static $validDisplays = array('description', 'venue', 'logo',
        'style', 'organizer', 'tickets');
    protected static $validStatus = array('live', 'started', 'ended');

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
     * Create a new user
     *
     * @param string
     * @param string
     * @return array
     */
    public function add($user, $pass)
    {
        //argument test
        $error = Argument::i()
            //Argument 1 must be a atring
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string');

        //if the string lenght of pass is less than 4
        if (strlen($pass) < 4) {
            //show an error
            $error->setMessage(Argument::INVALID_PASSWORD)->trigger();
        }

        $query = array('passwd' => $pass, 'email' => $user);

        return $this->getJsonResponse(self::URL_NEW, $query);
    }

    /**
     * Returns detail about the user or it's subuser
     *
     * @param int|string|null
     * @return array
     */
    public function getDetail($id = null)
    {
        //Argument 1 must be a integer, string or null
        Argument::i()->test(1, 'int', 'string', 'null');

        $query = array();
        //if it is integer
        if (is_numeric($id)) {
            //lets put it in query
            $query['user_id'] = $id;
            //is it a string?
        } else if (is_string($id)) {
            //add it to query
            $query['email'] = $id;
        }

        return $this->getJsonResponse(self::URL_GET, $query);
    }

    /**
     * Returns a user's event list
     *
     * @param string|null
     * @param string|array|null
     * @param string|array|null
     * @param string|null
     * @return array
     */
    public function getEvents(
        $user = null,
        $hide = null,
        $status = null,
        $order = null
    ) {
        //argument test
        Argument::i()
            //Argument 1 must be a string or null
            ->test(1, 'string', 'null')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'array', 'null')
            //Argument 3 must be a string or null
            ->test(3, 'string', 'array', 'null')
            //Argument 4 must be a string or null
            ->test(4, 'string', 'null');

        $query = array();
        //if user is not empty
        if (!is_null($user)) {
            //add it to our query
            $query['user'] = $user;
        }

        //if there is a hide
        if (!is_null($hide)) {
            //if hide is a string
            if (is_string($hide)) {
                //lets may it an array
                $hide = explode(',', $hide);
            }

            //at this ponit hide will be an array
            $displays = array();
            //for each hide
            foreach ($hide as $display) {
                //if this display is a valid display
                if (in_array($display, self::$validDisplays)) {
                    //lets add this to our valid status list
                    $displays[] = trim($display);
                }
            }

            //if we have at least one valid status
            if (!empty($displays)) {
                //lets make hide into a string
                $hide = implode(',', $displays);
                //and add to query
                $query['do_not_display'] = $hide;
            }
        }

        //if there is a status
        if (!is_null($status)) {
            //if status is a string
            if (is_string($status)) {
                //lets make it an array
                $status = explode(',', $status);
            }

            //at this point status will be an array
            $statuses = array();
            //for each status
            foreach ($status as $event) {
                //if this status is a valid status
                if (in_array($event, self::$validStatus)) {
                    //lets add this to our valid status list
                    $statuses[] = trim($event);
                }
            }

            //if we have at least one valid status
            if (!empty($statuses)) {
                //lets make statuses into a string
                $status = implode(',', $statuses);
                //and add to query
                $query['event_statuses'] = $status;
            }
        }

        //if order is equal to desc
        if ($order == 'desc') {
            //add it to our query
            $query['asc_or_desc'] = 'desc';
        }

        return $this->getJsonResponse(self::URL_LIST_EVENTS, $query);
    }

    /**
     * Returns a user's oraganizations
     *
     * @return array
     */
    public function getOrganizers()
    {
        return $this->getJsonResponse(self::URL_LIST_ORGANIZERS);
    }

    /**
     * Returns a user's ticket history
     *
     * @param string|null
     * @return array
     */
    public function getTickets($type = null)
    {
        Argument::i()
            //Argument 1 must be a string or null
            ->test(1, 'string', 'null');

        $query = array();
        if (!is_null($type)) {
            $query['type'] = trim($type);
        }

        return $this->getJsonResponse(self::URL_LIST_TICKETS, $query);
    }

    /**
     * Returns a user's venue list they have used before
     *
     * @return array
     */
    public function getVenues()
    {
        return $this->getJsonResponse(self::URL_LIST_VENUES);
    }

    /**
     * sets new email
     *
     * @param string
     * @return Eden\Eventbrite\User
     */
    public function setEmail($email)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string');

        if (!is_null($email)) {
            //add it to our query
            $this->query['new_email'] = $email;
        }

        return $this;
    }

    /**
     * sets new password
     *
     * @param string
     * @return Eden\Eventbrite\User
     */
    public function setPassword($password)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string');

        //if pass is not empty and the string lenght is greater than equal to 4
        if (!is_null($password) && strlen($password) >= 4) {
            //add it to our query
            $this->query['new_password'] = $password;
        }

        return $this;
    }

    /**
     * Updates the current user
     *
     * @return array
     */
    public function update()
    {
        return $this->getJsonResponse(self::URL_UPDATE, $this->query);
    }
}
