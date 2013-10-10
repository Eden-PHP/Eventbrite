<?php //-->
/*
 * This file is part of the Eventbrite package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Eventbrite;

use Eden\Core\Exception as CoreException;

/**
 * Eventbrite Exception
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Exception extends CoreException
{
    const TITLE_NOT_SET = 'You tried to set an event without setting a title. Call setTitle() before send()';
    const START_NOT_SET = 'You tried to set an event without setting a start date. Call setStart() before send()';
    const END_NOT_SET = 'You tried to set an event without setting an end date. Call setEnd() before send()';
    const ID_NOT_SET = 'You tried to set an event without setting an event ID. Call setEnd() before send()';
    const ZONE_NOT_SET = 'You tried to set an event without setting a timezone. Call setTimezone() before send()';
    const EVENT_NOT_SET = 'You tried to create/update a ticket without setting an event!';
    const NAME_NOT_SET = 'You tried to create/update a ticket without setting it\'s name!';
    const PRICE_NOT_SET = 'You tried to create/update a ticket without setting it\'s price!';
    const QUANTITY_NOT_SET = 'You tried to create/update a ticket without setting it\'s quantity!';
    const TICKET_ID_NOT_SET = 'You tried to update a ticket without setting it\'s id!';
    const PRIVACY_NOT_SET = 'You tried to set an event without setting the privacy. Call setPublic() or setPrivate() before send()';
    const URL_NOT_SET = 'You tried to set an event without setting a personal url. Call setUrl() before send()';
    const ORGANIZER_NOT_SET = 'You tried to set an event without setting an orgaizer. Call setOrganizer() before send()';
    const VENUE_NOT_SET = 'You tried to set an event without setting a venue. Call setVenue() before send()';
    const CAPACITY_NOT_SET = 'You tried to set an event without setting the capacity. Call setCapacity() before send()';
    const CURRENCY_NOT_SET = 'You tried to set an event without setting a currency. Call setCurrency() before send()';
    const INVALID_PASSWORD = 'Password must be 4 characters or greater!';
    const ORGANIZER_ORGANIZER_ID_NOT_SET = 'You tried to create a venue without organizer id!';
    const ORGANIZER_ID_NOT_SET = 'You tried to create a venue without venue id!';
    const ORGANIZER_NAME_NOT_SET = 'You tried to create a venue without name!';
    const ORGANIZER_COUNTRY_CODE_NOT_SET = 'You tried to create a venue without county code!';

    /**
     * check if valid
     *
     * @param string $type
     * @param scalar $data
     * @return boolean
     */
    protected function isValid($type, $data)
    {
        if ($type == 'gmt') {
            return preg_match('/^GMT(\-|\+)[0-9]{2,4}$/', $data);
        }

        return parent::_isValid($type, $data);
    }
}
