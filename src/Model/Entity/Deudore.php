<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deudore Entity
 *
 * @property int $Id
 * @property string $calificacion
 * @property bool $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $direccion
 * @property int $dni
 * @property string $nombre
 * @property string $apellido
 */
class Deudore extends Entity
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
    protected function _getPresentacionCompleta()
    {
        return $this->_properties['nombre'] .' DNI: ' . $this->_properties['dni'];
    }
    protected function _getPresentacionSimple()
    {
        return $this->_properties['nombre'];
    }
}
