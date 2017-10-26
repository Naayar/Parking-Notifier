<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sucursal Model
 *
 * @property \App\Model\Table\CompanyTable|\Cake\ORM\Association\BelongsTo $Company
 * @property \App\Model\Table\IngresoTable|\Cake\ORM\Association\HasMany $Ingreso
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Sucursal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sucursal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sucursal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sucursal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sucursal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sucursal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sucursal findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SucursalTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sucursal');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Company', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Ingreso', [
            'foreignKey' => 'sucursal_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'sucursal_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notBlank('name', 'El valor del campo no puede ir en blanco')
            ->notEmpty('name', 'Digita el nombre de la sucursal');

        $validator
            ->scalar('phone');

        $validator
            ->scalar('address');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['company_id'], 'Company'));

        return $rules;
    }
}
