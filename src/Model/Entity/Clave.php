<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Clave Entity
 *
 * @property int $id
 * @property string $valor
 * @property bool $active
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $company_id
 *
 * @property \App\Model\Entity\Company $company
 */
class Clave extends Entity
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
        'valor' => true,
        'active' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'company_id' => true,
        'company' => true
    ];
}
