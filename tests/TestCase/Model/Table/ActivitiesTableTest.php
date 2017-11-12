<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActivitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActivitiesTable Test Case
 */
class ActivitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActivitiesTable
     */
    public $Activities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.activities',
        'app.festivals',
        'app.departments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Activities') ? [] : ['className' => ActivitiesTable::class];
        $this->Activities = TableRegistry::get('Activities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Activities);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {

        $activity = $this->Activities->newEntity([
            'festival_id' => 1,
            'department_id' => 1,
            'name' => 'cooking',
            'start' => '2000-10-18 08:36:13',
            'end' => '2000-10-18 08:36:13',
            'manpower' => 5

        ]);

        $result = $this->Activities->checkRules($activity);
        $this->assertFalse($result);

        $this->assertArrayHasKey('checkIsCorrectTimeActivity', $activity->getErrors()['start']);
    }
}
