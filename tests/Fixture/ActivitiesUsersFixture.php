<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActivitiesUsersFixture
 *
 */
class ActivitiesUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'user_id' => ['type' => 'smallinteger', 'length' => 5, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'activitie_id' => ['type' => 'integer', 'length' => 8, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'start' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'end' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'fulltime' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_people_has_activities_activities1_idx' => ['type' => 'index', 'columns' => ['activitie_id'], 'length' => []],
            'fk_people_has_activities_people1_idx' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['user_id', 'activitie_id'], 'length' => []],
            'fk_people_has_activities_activities1' => ['type' => 'foreign', 'columns' => ['activitie_id'], 'references' => ['activities', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_people_has_activities_people1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'user_id' => 1,
            'activitie_id' => 1,
            'start' => '2017-10-09 11:44:18',
            'end' => '2017-10-09 11:44:18',
            'fulltime' => 1
        ],
    ];
}
