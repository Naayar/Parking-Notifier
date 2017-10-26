<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sucursal Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $company_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Ingreso[] $ingreso
 * @property \App\Model\Entity\User[] $users
 */
class Sucursal extends Entity
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
        'address' => true,
        'created' => true,
        'modified' => true,
        'company_id' => true,
        'company' => true,
        'ingreso' => true,
        'users' => true
    ];
}
