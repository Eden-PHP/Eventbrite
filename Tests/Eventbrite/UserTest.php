<?php

namespace Eden\Eventbrite\Tests\Eventbrite;

class User extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->email = 'dummyemail@dummy.com';
        $this->password = 'p@55w0rd';
        $this->id = '74428463';
        $this->userId = '74502563';
        $this->userEmail = 'akosirohan@gmail.com';
        $this->responseKey = '3TBXH4JTITJUHEMARNAK';
        $this->token = '6KA4BFRZN4EXRUBW63TF';
        $this->user = eden('eventbrite')->user($this->token);
    }

    public function testAdd()
    {
        // $user = $this->user->add($this->email, $this->password);

        // $this->assertArrayHasKey('process', $user);
        // $this->assertArrayHasKey('status', $user['process']);
        // $this->assertTrue($user['process']['status'] == 'OK');
    }

    public function testGetDetail()
    {
        // check if user email is passed
        // $detail = $this->user->getDetail($this->userEmail);
        // $this->assertArrayHasKey('user', $detail);

        // check if user id is passed
        // $detail = $this->user->getDetail($this->userId);
        // $this->assertArrayHasKey('user', $detail);
    }

    public function testGetEvents()
    {
        // $events = $this->user->getEvents(
        //     $this->id,
        //     array('description', 'venue', 'logo', 'style', 'tickets'),
        //     array('live'),
        //     'desc'
        // );

        // $this->assertArrayHasKey('events', $events);
    }

    public function testGetOrganizers()
    {
        $organizers = $this->user->getOrganizers();

        $this->assertArrayHasKey('organizers', $organizers);
    }

    public function testGetTickets()
    {
        $tickets = $this->user->getTickets('all');

        $this->assertArrayHasKey('user_tickets', $tickets);
    }

    public function testGetVenues()
    {
        $venues = $this->user->getVenues();

        $this->assertArrayHasKey('venues', $venues);
    }

    public function testSetEmail()
    {
        $emailAddress = 'dummyemail@email.com';
        $email = $this->user->setEmail($emailAddress);

        $this->assertInstanceOf('Eden\Eventbrite\User', $email);
        $this->assertAttributeEquals(
            array('new_email' => $emailAddress),
            'query',
            $email
        );
    }

    public function testSetPassword()
    {
        $password = 'dummyemail@email.com';
        $user = $this->user->setPassword($password);

        $this->assertInstanceOf('Eden\Eventbrite\User', $user);
        $this->assertAttributeEquals(
            array('new_password' => $password),
            'query',
            $user
        );
    }

    public function testUpdate()
    {
        // $update = $this->user
        //     ->setEmail('akosirohan@gmail.com')
        //     ->setPassword('qwerty123')
        //     ->update();

        // $this->assertArrayHasKey('process', $update);
        // $this->assertArrayHasKey('status', $update['process']);
        // $this->assertTrue($update['process']['status'] == 'OK');
    }
}
