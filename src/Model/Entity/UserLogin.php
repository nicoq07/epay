<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserLogin Entity
 *
 * @property int $user_id
 * @property \Cake\I18n\Time $fecha_activo
 *
 * @property \App\Model\Entity\User $user
 */
class UserLogin extends Entity
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
        'user_id' => false
    ];
}
