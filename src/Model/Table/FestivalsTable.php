<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Festivals Model
 *
 * @property \App\Model\Table\PlacesTable|\Cake\ORM\Association\BelongsTo $Places
 * @property \App\Model\Table\ActivitiesTable|\Cake\ORM\Association\HasMany $Activities
 *
 * @method \App\Model\Entity\Festival get($primaryKey, $options = [])
 * @method \App\Model\Entity\Festival newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Festival[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Festival|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Festival patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Festival[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Festival findOrCreate($search, callable $callback = null, $options = [])
 */
class FestivalsTable extends Table
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

        $this->setTable('festivals');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Places', [
            'foreignKey' => 'place_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Activities', [
            'foreignKey' => 'festival_id'
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
            ->allowEmpty('name');

        $validator
            ->dateTime('start')
            ->allowEmpty('start');

        $validator
            ->dateTime('end')
            ->allowEmpty('end');

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
        $rules->add($rules->existsIn(['place_id'], 'Places'));

        return $rules;
    }
}
