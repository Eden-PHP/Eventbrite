<?php

namespace Eden\Eventbrite\Tests\Eventbrite\Event;

class Set extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->token = '6KA4BFRZN4EXRUBW63TF';
        $this->id = '8545398517';
        $this->eventSet = eden('eventbrite')
        ->event($this->token)->set();
    }

    public function testCreate()
    {
        // $event = $this->eventSet
        //     ->isPrivate()
        //     ->setTitle('event created using api')
        //     ->setStart(1385852400)
        //     ->setEnd(1388358000)
        //     ->setTimezone('US/Pacific')
        //     ->create();

        // $this->assertArrayHasKey('process', $event);
        // $this->assertArrayHasKey('status', $event['process']);
        // $this->assertTrue($event['process']['status'] == 'OK');
    }

    public function testUpdate()
    {
        // $id = 8750363573;
        // $event = $this->eventSet
        //     ->setId($id)
        //     ->isPublic()
        //     ->setTitle('UPDATED TITLE')
        //     ->setTimezone('Asia/Manila')
        //     ->update();

        // $this->assertArrayHasKey('process', $event);
        // $this->assertArrayHasKey('status', $event['process']);
        // $this->assertTrue($event['process']['status'] == 'OK');
    }

    public function testIsPrivate()
    {
        $event = $this->eventSet
            ->isPrivate();

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('privacy' => 0),
            'query',
            $event
        );
    }

    public function testIsPublic()
    {
        $event = $this->eventSet
            ->isPublic();

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('privacy' => 1),
            'query',
            $event
        );
    }


    public function testSetBackground()
    {
        $color = 'ffffff';
        $event = $this->eventSet
            ->setBackground($color);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('background_color' => $color),
            'query',
            $event
        );
    }

    public function testSetBorderColor()
    {
        $color = 'ffffff';
        $event = $this->eventSet
            ->setBorderColor($color);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('box_border_color' => $color),
            'query',
            $event
        );
    }

    public function testSetBoxBackground()
    {
        $color = 'ffffff';
        $event = $this->eventSet
            ->setBoxBackground($color);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('box_background_color' => $color),
            'query',
            $event
        );
    }

    public function testSetBoxColor()
    {
        $color = '000000';
        $event = $this->eventSet
            ->setBoxColor($color);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('box_text_color' => $color),
            'query',
            $event
        );
    }

    public function testSetCapacity()
    {
        $capacity = 25;
        $event = $this->eventSet
            ->setCapacity($capacity);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('capacity' => $capacity),
            'query',
            $event
        );
    }

    public function testSetCurrency()
    {
        $currency = 'PHP';
        $event = $this->eventSet
            ->setCurrency($currency);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('currency' => $currency),
            'query',
            $event
        );
    }

    public function testSetDescription()
    {
        $description = 'The quick brown fox jumps over the lazy dog.';
        $event = $this->eventSet
            ->setDescription($description);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('description' => $description),
            'query',
            $event
        );
    }

    public function testSetDraft()
    {
        $event = $this->eventSet
            ->setDraft();

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('status' => 'draft'),
            'query',
            $event
        );
    }

    public function testSetEnd()
    {
        $endDate = '2013-12-31 00:00:00';
        $event = $this->eventSet
            ->setEnd($endDate);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('end_date' => $endDate),
            'query',
            $event
        );
    }

    public function testSetFooter()
    {
        $footer = 'The quick brown fox jumps over the lazy dog.';
        $event = $this->eventSet
            ->setFooter($footer);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('custom_footer' => $footer),
            'query',
            $event
        );
    }

    public function testSetHeader()
    {
        $header = 'The quick brown fox jumps over the lazy dog.';
        $event = $this->eventSet
            ->setHeader($header);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('custom_header' => $header),
            'query',
            $event
        );
    }

    public function testSetHeaderBackground()
    {
        $color = '000000';
        $event = $this->eventSet
            ->setHeaderBackground($color);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('box_header_background_color' => $color),
            'query',
            $event
        );
    }

    public function testSetHeaderColor()
    {
        $color = '000000';
        $event = $this->eventSet
            ->setHeaderColor($color);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('box_header_text_color' => $color),
            'query',
            $event
        );
    }

    public function testSetId()
    {
        $id = '12938938';
        $event = $this->eventSet
            ->setId($id);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('event_id' => $id),
            'query',
            $event
        );
    }

    public function testSetLinkColor()
    {
        $color = '000000';
        $event = $this->eventSet
            ->setLinkColor($color);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('link_color' => $color),
            'query',
            $event
        );
    }

    public function testSetLive()
    {
        $event = $this->eventSet
            ->setLive();

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('status' => 'live'),
            'query',
            $event
        );
    }

    public function testSetOrganizer()
    {
        $id = '12938938';
        $event = $this->eventSet
            ->setOrganizer($id);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('organizer_id' => $id),
            'query',
            $event
        );
    }

    public function testSetStart()
    {
        $endDate = '2013-12-31 23:59:59';
        $event = $this->eventSet
            ->setStart($endDate);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('start_date' => $endDate),
            'query',
            $event
        );
    }

    public function testSetTextColor()
    {
        $color = '000000';
        $event = $this->eventSet
            ->setTextColor($color);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('text_color' => $color),
            'query',
            $event
        );
    }

    public function testSetTimezone()
    {
        $timezone = 'US/Pacific';
        $event = $this->eventSet
            ->setTimezone($timezone);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('timezone' => $timezone),
            'query',
            $event
        );
    }

    public function testSetTitle()
    {
        $title = 'This is a title.';
        $event = $this->eventSet
            ->setTitle($title);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('title' => $title),
            'query',
            $event
        );
    }

    public function testSetTitleColor()
    {
        $color = '000000';
        $event = $this->eventSet
            ->setTitleColor($color);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('title_text_color' => $color),
            'query',
            $event
        );
    }

    public function testSetUrl()
    {
        $presonalizedUrl = 'http://personalized.me';
        $event = $this->eventSet
            ->setUrl($presonalizedUrl);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('personalized_url' => $presonalizedUrl),
            'query',
            $event
        );
    }

    public function testSetVenue()
    {
        $venueId = 192923;
        $event = $this->eventSet
            ->setVenue($venueId);

        $this->assertInstanceOf('Eden\Eventbrite\Event\Set', $event);
        $this->assertAttributeEquals(
            array('venue_id' => $venueId),
            'query',
            $event
        );
    }
}
