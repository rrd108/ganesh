<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Managers Model
 *
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\HasMany $Departments
 *
 * @method \App\Model\Entity\Manager get($primaryKey, $options = [])
 * @method \App\Model\Entity\Manager newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Manager[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Manager|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Manager patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Manager[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Manager findOrCreate($search, callable $callback = null, $options = [])
 */
class ManagersTable extends Table
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

        $this->setTable('managers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Departments', [
            'foreignKey' => 'manager_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->allowEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('phone')
            ->allowEmpty('phone');

        $validator
            ->email('email')
            ->allowEmpty('email');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
