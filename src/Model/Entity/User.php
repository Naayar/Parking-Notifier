<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property string $codigo
 * @property string $name
 * @property string $lastName
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $token
 * @property bool $active
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $company_id
 * @property int $sucursal_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Sucursal $sucursal
 * @property \App\Model\Entity\Ingreso[] $ingreso
 * @property \App\Model\Entity\Vehiculo[] $vehiculo
 * @property \App\Model\Entity\Medio[] $medio
 */
class User extends Entity
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
        'codigo' => true,
        'cedula' => true,
        'name' => true,
        'lastName' => true,
        'phone' => true,
        'email' => true,
        'password' => true,
        'role' => true,
        'token' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'company_id' => true,
        'sucursal_id' => true,
        'company' => true,
        'sucursal' => true,
        'ingreso' => true,
        'vehiculo' => true,
        'medio' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];

    protected function _setPassword($value){

        if (!empty($value)) {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        } else {
            $id_user = $this->_properties['id'];
            $user = TableRegistry::get('Users')->recoverPassword($id_user);
            return $user;
        }
    }
}
