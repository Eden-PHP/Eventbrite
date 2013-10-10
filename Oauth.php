<?php //-->
/*
 * This file is part of the Eventbrite package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Eventbrite;

use Eden\Oauth\Oauth2\Client;

/**
 * Eventbrite oauth
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Oauth extends Client
{
    const INSTANCE = 0; // set to multiton
    const REQUEST_URL = 'https://www.eventbrite.com/oauth/authorize';
    const ACCESS_URL = 'https://www.eventbrite.com/oauth/token';

    /**
     * Construct Oauth class
     * @param string client id
     * @param string api secret
     * @param string redirect url
     * @return void
     */
    public function __construct($clientId, $appSecret, $redirect)
    {
        //argument test
        Argument::i()
            //Argument 1 must be a string
            ->test(1, 'string')
            //Argument 2 must be a string
            ->test(2, 'string')
            //Argument 3 must be a string
            ->test(3, 'string');

        parent::__construct(
            $clientId,
            $appSecret,
            $redirect,
            self::REQUEST_URL,
            self::ACCESS_URL
        );
    }
}
