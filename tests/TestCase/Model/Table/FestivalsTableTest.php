<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FestivalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FestivalsTable Test Case
 */
class FestivalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FestivalsTable
     */
    public $Festivals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.festivals',
        'app.places',
        'app.departments',
        'app.managers',
        'app.activities',
        'app.users',
        'app.activities_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Festivals') ? [] : ['className' => FestivalsTable::class];
        $this->Festivals = TableRegistry::get('Festivals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Festivals);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
