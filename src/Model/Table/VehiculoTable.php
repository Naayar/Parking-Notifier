<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehiculo Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Vehiculo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehiculo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehiculo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehiculo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehiculo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VehiculoTable extends Table
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

        $this->setTable('vehiculo');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('placa')
            ->requirePresence('placa', 'create')
            ->add('placa', 'length', ['rule' => ['maxLength', 8], 'message' => 'La longitud de la placa excede los 8 caracteres'])
            ->alphaNumeric('placa', 'No puede contener simbolos')
            ->notEmpty('placa', 'Digita la placa de tu vehículo');

        $validator
            ->scalar('marca')
            ->requirePresence('marca', 'create')
            ->alphaNumeric('placa', 'No puede contener simbolos')
            ->notEmpty('marca', 'Digita la marca de tu vehículo');

        $validator
            ->scalar('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
