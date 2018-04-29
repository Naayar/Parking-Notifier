<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ingreso Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $entrada
 * @property \Cake\I18n\FrozenTime $salida
 * @property bool $validador
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property int $sucursal_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Sucursal $sucursal
 * @property \App\Model\Entity\Reporte[] $reporte
 */
class Ingreso extends Entity
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
        'entrada' => true,
        'salida' => true,
        'validador' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'sucursal_id' => true,
        'user' => true,
        'sucursal' => true,
        'reporte' => true
    ];
}
