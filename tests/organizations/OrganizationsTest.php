<?php
/**
 * OrganizationsTest.php
 * Date: 08/01/2019
 * Time: 15:18
 */

namespace Mediatoolkit\Tests\Organizations;


use Mediatoolkit\ActiveCampaign\Organizations\Organizations;
use Mediatoolkit\Tests\ResourceTestCase;

class OrganizationsTest extends ResourceTestCase
{

    protected static $name;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$name = 'Test Org';
    }

    public static function tearDownAfterClass()
    {
        parent::tearDownAfterClass();
        self::$name = null;
    }

    public function testOrganizations()
    {
        $organizations = new Organizations($this->client);

        $create = $organizations->create([
            'name' => self::$name
        ]);

        $org = json_decode($create, true);
        $this->assertCount(1, $org);
    }

}