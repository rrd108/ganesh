<?php
use Migrations\AbstractMigration;

class InitialGanesh extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('activities')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 8,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('festival_id', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('department_id', 'integer', [
                'default' => null,
                'limit' => 3,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('start', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('end', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('manpower', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => true,
                'signed' => false,
            ])
            ->addIndex(
                [
                    'department_id',
                ]
            )
            ->addIndex(
                [
                    'festival_id',
                ]
            )
            ->create();

        $this->table('activities_users')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 8,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('user_id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('activity_id', 'integer', [
                'default' => null,
                'limit' => 8,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('start', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('end', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('fulltime', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'activity_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('departments')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 3,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('place_id', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('user_id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addIndex(
                [
                    'place_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('festivals')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('place_id', 'integer', [
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('start', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('end', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'place_id',
                ]
            )
            ->create();

        $this->table('places')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 5,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('address', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('lat', 'float', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 6,
            ])
            ->addColumn('lng', 'float', [
                'default' => null,
                'null' => true,
                'precision' => 10,
                'scale' => 6,
            ])
            ->addIndex(
                [
                    'name',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('social_accounts')
            ->addColumn('id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('user_id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('provider', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('reference', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('avatar', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('link', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('token', 'string', [
                'default' => null,
                'limit' => 500,
                'null' => false,
            ])
            ->addColumn('token_secret', 'string', [
                'default' => null,
                'limit' => 500,
                'null' => true,
            ])
            ->addColumn('token_expires', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('active', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('data', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->create();

        $this->table('users')
            ->addColumn('id', 'uuid', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('token', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('token_expires', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('api_token', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('activation_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('secret', 'string', [
                'default' => null,
                'limit' => 32,
                'null' => true,
            ])
            ->addColumn('secret_verified', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('tos_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('active', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('is_superuser', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('role', 'string', [
                'default' => 'user',
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('activities')
            ->addForeignKey(
                'department_id',
                'departments',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'festival_id',
                'festivals',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('activities_users')
            ->addForeignKey(
                'activity_id',
                'activities',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('departments')
            ->addForeignKey(
                'place_id',
                'places',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('festivals')
            ->addForeignKey(
                'place_id',
                'places',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('social_accounts')
            ->addForeignKey(
                'user_id',
                'users',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('activities')
            ->dropForeignKey(
                'department_id'
            )
            ->dropForeignKey(
                'festival_id'
            );

        $this->table('activities_users')
            ->dropForeignKey(
                'activity_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->table('departments')
            ->dropForeignKey(
                'place_id'
            )
            ->dropForeignKey(
                'user_id'
            );

        $this->table('festivals')
            ->dropForeignKey(
                'place_id'
            );

        $this->table('social_accounts')
            ->dropForeignKey(
                'user_id'
            );

        $this->dropTable('activities');
        $this->dropTable('activities_users');
        $this->dropTable('departments');
        $this->dropTable('festivals');
        $this->dropTable('places');
        $this->dropTable('social_accounts');
        $this->dropTable('users');
    }
}
