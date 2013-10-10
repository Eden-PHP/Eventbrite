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
 * Eventbrite API factory. This is a factory class with
 * methods that will load up different Eventbrite classes.
 * Eventbrite classes are organized as described on their
 * developer site: discount, event, organizer, payment,
 * ticket, user, venue. We also added a search class and
 * set class with advanced options for searching and
 * creating events.
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Factory extends Base
{
    /**
     * Returns Eventbrite Oauth
     *
     * @param string client ID
     * @param string app secret
     * @param string redirect url
     * @return Eden\Eventbrite\Oauth
     */
    public function auth($clientId, $appSecret, $redirect)
    {
        Argument::i()
            ->test(1, 'string', 'int')
            ->test(2, 'string')
            ->test(3, 'string');

        return Oauth::i($clientId, $appSecret, $redirect);
    }

    /**
     * Returns Eventbrite Discount
     *
     * @param string
     * @param string|bool|null
     * @return Eden\Eventbrite\Discount
     */
    public function discount($user, $api = null)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        return Discount::i($user, $api);
    }

    /**
     * Returns Eventbrite Event
     *
     * @param string
     * @param string|bool|null
     * @return Eden\Eventbrite\Event
     */
    public function event($user, $api = null)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        return Event::i($user, $api);
    }

    /**
     * Returns Eventbrite Organizer
     *
     * @param string
     * @param string|bool|null
     * @return Eden\Eventbrite\Organizer
     */
    public function organizer($user, $api = null)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        return Organizer::i($user, $api);
    }

    /**
     * Returns Eventbrite Payment
     *
     * @param string
     * @param string|bool|null
     * @return Eden\Eventbrite\Payment
     */
    public function payment($user, $api = null)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        return Payment::i($user, $api);
    }

    /**
     * Returns Eventbrite Search
     *
     * @param string
     * @param string|bool|null
     * @return Eden\Eventbrite\Event\Search
     */
    public function search($user, $api = null)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        return Event\Search::i($user, $api);
    }

    /**
     * Returns Eventbrite Set
     *
     * @param string
     * @param string|bool|null
     * @return Eden\Eventbrite\Event\Set
     */
    public function set($user, $api = null)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        return Event\Set::i($user, $api);
    }

    /**
     * Returns Eventbrite Ticket
     *
     * @param string
     * @param string|bool|null
     * @return Eden\Eventbrite\Ticket
     */
    public function ticket($user, $api = null)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        return Ticket::i($user, $api);
    }

    /**
     * Returns Eventbrite User
     *
     * @param string
     * @param string|bool|null
     * @return Eden\Eventbrite\User
     */
    public function user($user, $api = null)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        return User::i($user, $api);
    }

    /**
     * Returns Eventbrite Venue
     *
     * @param string
     * @param string|bool|null
     * @return Eden\Eventbrite\Venue
     */
    public function venue($user, $api = null)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string or null
            ->test(2, 'string', 'bool', 'null');

        return Venue::i($user, $api);
    }
}
