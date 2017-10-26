<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Company Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $ciudad_id
 *
 * @property \App\Model\Entity\Ciudad $ciudad
 * @property \App\Model\Entity\Clave[] $clave
 * @property \App\Model\Entity\Sucursal[] $sucursal
 * @property \App\Model\Entity\User[] $users
 */
class Company extends Entity
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
        'name' => true,
        'phone' => true,
        'created' => true,
        'modified' => true,
        'ciudad_id' => true,
        'ciudad' => true,
        'clave' => true,
        'sucursal' => true,
        'users' => true
    ];
}
