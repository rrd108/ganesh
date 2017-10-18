<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActivitiesUsers Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ActivitiesTable|\Cake\ORM\Association\BelongsTo $Activities
 *
 * @method \App\Model\Entity\ActivitiesUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActivitiesUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActivitiesUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActivitiesUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActivitiesUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActivitiesUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActivitiesUser findOrCreate($search, callable $callback = null, $options = [])
 */
class ActivitiesUsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('activities_users');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey(['user_id', 'activitie_id']);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Activities', [
            'foreignKey' => 'activitie_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->dateTime('start')
            ->allowEmpty('start');

        $validator
            ->dateTime('end')
            ->allowEmpty('end');

        $validator
            ->boolean('fulltime')
            ->allowEmpty('fulltime');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['activitie_id'], 'Activities'));

        return $rules;
    }
}
