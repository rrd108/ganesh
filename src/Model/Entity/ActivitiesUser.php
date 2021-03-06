<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ActivitiesUser Entity
 *
 * @property int $id
 * @property string $user_id
 * @property int $activity_id
 * @property \Cake\I18n\FrozenTime $start
 * @property \Cake\I18n\FrozenTime $end
 * @property bool $fulltime
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Activity $activity
 */
class ActivitiesUser extends Entity
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
        'user_id' => false,
        'activitie_id' => false
    ];

    public function listHours(){
        $hours = array();
        $i = 0;
        $timestamp = $this->start->timestamp;
        while ($timestamp < $this->end->timestamp){
            $hour = date('H:i',$timestamp);
            $timestamp += 3600;
            $hours[$i] = $hour;
            $i++;
        }
        return $hours;
    }
}
