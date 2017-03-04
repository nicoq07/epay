<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cartera Entity
 *
 * @property int $Id
 * @property string $descripcion
 * @property int $empresa_id
 * @property int $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Deuda[] $deudas
 */
class Cartera extends Entity
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
        'Id' => false
    ];
}
