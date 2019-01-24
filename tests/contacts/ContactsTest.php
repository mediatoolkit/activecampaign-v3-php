<?php

namespace Mediatoolkit\Tests\Contacts;

use Mediatoolkit\ActiveCampaign\Contacts\Contacts;
use Mediatoolkit\Tests\ResourceTestCase;

class ContactsTest extends ResourceTestCase
{

    private static $email;
    private static $firstName;
    private static $lastName;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$email = 'wearetesting@mailinator.com';
        self::$firstName = 'Weare';
        self::$lastName = 'Testing';
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
        self::$email = null;
        self::$firstName = null;
        self::$lastName = null;
    }

    public function testContact()
    {
        $contacts = new Contacts($this->client);
        $create = $contacts->create([
            'email' => self::$email,
            'firstName' => self::$firstName,
            'lastName' => self::$lastName
        ]);

        $createdContact = json_decode($create, true);
        $this->assertEquals(1, count($createdContact));

        $getContact = $contacts->get($createdContact['contact']['id']);
        $getContact = json_decode($getContact, true);
        $this->assertEquals(self::$email, $getContact['contact']['email']);

        $listNotExisting = $contacts->listAll([
            'email' => 'nonexistinguser@mail.tests'
        ]);

        $listNotExisting = json_decode($listNotExisting, true);
        $this->assertCount(0, $listNotExisting['contacts']);

        $limitWorking = $contacts->listAll([
            'email' => self::$email
        ], 23, 5);

        $limitWorking = json_decode($limitWorking, true);
        $this->assertCount(0, $limitWorking['contacts']);

        $deleteContact = $contacts->delete($createdContact['contact']['id']);
        $this->assertEquals(true, $deleteContact);
    }

}