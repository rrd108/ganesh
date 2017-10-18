<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Festival Entity
 *
 * @property int $id
 * @property int $place_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $start
 * @property \Cake\I18n\FrozenTime $end
 *
 * @property \App\Model\Entity\Place $place
 * @property \App\Model\Entity\Activity[] $activities
 */
class Festival extends Entity
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
        'place_id' => true,
        'name' => true,
        'start' => true,
        'end' => true,
        'place' => true,
        'activities' => true
    ];
}
