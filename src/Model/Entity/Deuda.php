<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deuda Entity
 *
 * @property int $Id
 * @property int $deudor_id
 * @property int $cartera_id
 * @property string $producto
 * @property bool $active
 * @property float $capital_inicial
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $numero_producto
 * @property int $usuario_id
 * @property float $total
 * @property \Cake\I18n\Time $fecha_mora
 * @property \Cake\I18n\Time $dias_mora
 *
 * @property \App\Model\Entity\Deudore $deudore
 * @property \App\Model\Entity\Cartera $cartera
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\DeudasGestione[] $deudas_gestiones
 */
class Deuda extends Entity
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
