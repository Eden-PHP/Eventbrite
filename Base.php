<?php //-->
/*
 * This file is part of the Eventbrite package of the Eden PHP Library.
 * (c) 2013-2014 Openovate Labs
 *
 * Copyright and license information can be found at LICENSE
 * distributed with this package.
 */

namespace Eden\Eventbrite;

use Eden\Core\Base as CoreBase;
use Eden\Curl\Base as Curl;

/**
 * Eventbrite Base
 *
 * @vendor Eden
 * @package Eventbrite
 * @author Airon Paul Dumael airon.dumael@gmail.com
 */
class Base extends CoreBase
{
    const ACCESS_HEADER = 'Authorization: Bearer %s';

    protected $user = null;
    protected $api = null;
    protected $meta = array();

    /**
     * Returns the meta of the last call
     *
     * @param string|null meta name
     * @return array
     */
    public function getMeta($key = null)
    {
        Argument::i()->test(1, 'string', 'null');

        if (isset($this->meta[$key])) {
            return $this->meta[$key];
        }

        return $this->meta;
    }

    /**
     * return the response in array
     *
     * @param string $url
     * @param array $query
     * @return array
     */
    protected function getJsonResponse($url, array $query = array())
    {
        $response = $this->getResponse($url, $query);

        return json_decode($response, true);
    }

    /**
     * return response
     *
     * @param string $url
     * @param array $query
     * @return string
     */
    protected function getResponse($url, array $query = array())
    {
        $headers = array();
        $headers[] = 'Content-Type: application/json';

        //if api key is null
        if (is_null($this->api)) {
            //we must have an oauth token
            $headers[] = sprintf(self::ACCESS_HEADER, $this->user);
        } else {
            $query['app_key'] = $this->api;
            $query['user_key'] = $this->user;
        }

        $query  = http_build_query($query);

        //determine the conector
        $connector = null;

        //if there is no question mark
        if (strpos($url, '?') === false) {
            $connector = '?';
        } else if (substr($url, -1) != '?') {
            //if the redirect doesn't end with a question mark
            $connector = '&';
        }

        //now add the authorization to the url
        $url .= $connector.$query;

        //set curl
        $curl = Curl::i()
            ->verifyHost(false)
            ->verifyPeer(false)
            ->setUrl($url)
            ->setHeaders($headers);

        //get the response
        $response = $curl->getResponse();

        $this->meta = $curl->getMeta();
        $this->meta['url'] = $url;
        $this->meta['headers'] = $headers;
        $this->meta['query'] = $query;

        return $response;
    }

    /**
     * return xml response as object
     *
     * @param string $url
     * @param array $query
     * @return object
     */
    protected function getXmlResponse($url, array $query = array())
    {
        $response = $this->getResponse($url, $query);

        return simplexml_load_string($response);
    }
}
