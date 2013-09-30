<?php

namespace Eden\Eventbrite\Tests\Eventbrite;

class OauthTest extends \PHPUnit_Framework_TestCase
{
    protected $key = '7UMLFRQTSZR4QIFTD2';//[YOUR KEY]';
    protected $secret = 'S6BRTDJRHMRO7VLHWC3EVRARAAVEJJQLWE5KW75JQGVR5NV2QQ';//'[YOUR SECRET]';
    protected $redirectUrl = 'http://localhost/';
    protected $responseKey = '3TBXH4JTITJUHEMARNAK';
    protected $token = '6KA4BFRZN4EXRUBW63TF';

    public function testGetLoginUrl()
    {
        // $loginUrl = eden('eventbrite')
        //     ->auth($this->key, $this->secret, $this->redirectUrl)
        //     ->getLoginUrl();
        // print_r($loginUrl);
        // $this->assertStringStartsWith('https://www.eventbrite.com/oauth/authorize', $loginUrl);
    }

    public function testGetAccess()
    {
        // if (!trim($this->responseKey)) {
        //     return;
        // }

        // $token = eden('eventbrite')
        //     ->auth($this->key, $this->secret, $this->redirectUrl)
        //     ->getAccess($this->responseKey);

        // print_r($token);
        // $this->assertArrayHasKey('access_token', $token);
        // $this->assertArrayHasKey('token_type', $token);
    }
}
