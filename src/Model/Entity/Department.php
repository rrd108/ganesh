<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property int $id
 * @property int $manager_id
 * @property int $place_id
 * @property string $name
 *
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Place $place
 * @property \App\Model\Entity\Activity[] $activities
 */
class Department extends Entity
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
        'manager_id' => true,
        'place_id' => true,
        'name' => true,
        'manager' => true,
        'place' => true,
        'activities' => true
    ];
}
