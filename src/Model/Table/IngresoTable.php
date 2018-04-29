<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ingreso Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SucursalTable|\Cake\ORM\Association\BelongsTo $Sucursal
 * @property \App\Model\Table\ReporteTable|\Cake\ORM\Association\HasMany $Reporte
 *
 * @method \App\Model\Entity\Ingreso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ingreso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ingreso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ingreso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ingreso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ingreso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ingreso findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IngresoTable extends Table
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

        $this->setTable('ingreso');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sucursal', [
            'foreignKey' => 'sucursal_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Reporte', [
            'foreignKey' => 'ingreso_id'
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
            ->dateTime('entrada')
            ->requirePresence('entrada', 'create')
            ->notEmpty('entrada');

        $validator
            ->dateTime('salida')
            ->requirePresence('salida', 'update')
            ->notEmpty('salida');

        $validator
            ->boolean('validador')
            ->requirePresence('validador', 'create')
            ->notEmpty('validador');

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
        $rules->add($rules->existsIn(['sucursal_id'], 'Sucursal'));

        return $rules;
    }
}
