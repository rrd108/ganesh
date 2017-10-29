<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity
 *
 * @property int $id
 * @property int $festival_id
 * @property int $department_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $start
 * @property \Cake\I18n\FrozenTime $end
 * @property int $manpower
 *
 * @property \App\Model\Entity\Festival $festival
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\User[] $users
 */
class Activity extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    public function isCorrectTime($festival)
    {
        return $this->start <= $this->end && $this->isInFestivalInterval($festival);
    }

    public function isInFestivalInterval($festival)
    {
        return $festival->start <= $this->start && $festival->end >= $this->end;
    }
}
