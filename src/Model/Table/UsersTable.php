<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\CompanyTable|\Cake\ORM\Association\BelongsTo $Company
 * @property \App\Model\Table\SucursalsTable|\Cake\ORM\Association\BelongsTo $Sucursals
 * @property \App\Model\Table\IngresoTable|\Cake\ORM\Association\HasMany $Ingreso
 * @property \App\Model\Table\VehiculoTable|\Cake\ORM\Association\HasMany $Vehiculo
 * @property \App\Model\Table\MedioTable|\Cake\ORM\Association\BelongsToMany $Medio
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Company', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Notificacion', [
            'foreignKey' => 'user_id_origen',
            'foreignKey' => 'user_id_destino'
        ]);
        $this->belongsTo('Sucursal', [
            'foreignKey' => 'sucursal_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Ingreso', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Vehiculo', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Medio', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'medio_id',
            'joinTable' => 'users_medio'
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
            ->scalar('cedula')
            ->requirePresence('name', 'create')
            ->allowEmpty('cedula', 'create')
            ->notEmpty('cedula', 'Escribe tu número de identificación')
            ->notBlank('cedula', 'El valor del campo no puede ir en blanco')
            ->alphaNumeric('codigo', 'No puede contener simbolos');

        $validator
            ->scalar('codigo')
            ->requirePresence('codigo', 'create')
            ->notEmpty('codigo', 'Escribe tu código')
            ->notBlank('codigo', 'El valor del campo no puede ir en blanco')
            ->alphaNumeric('codigo', 'No puede contener simbolos')
            ->add('codigo', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Este codigo ya se encuentra en uso']);

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notBlank('name', 'El valor del campo no puede ir en blanco')
            ->notEmpty('name', 'Escribe tu nombre');

        $validator
            ->scalar('lastName')
            ->requirePresence('lastName', 'create')
            ->notBlank('lastName', 'El valor del campo no puede ir en blanco')
            ->notEmpty('lastName', 'Escribe tu apellido');

        $validator
            ->scalar('phone')
            ->allowEmpty('phone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->add('email', 'valid', ['rule' => 'email', 'message' => 'Escribe un correo valido'])
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Este correo ya se encuentra en uso'])
            ->notEmpty('email', 'Escribe tu correo electrónico');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password', 'Elige una contraseña', 'create')
            ->add('password', 'length', ['rule' => ['minLength', 6], 'message' => 'Debe tener minimo 6 caracteres entre números y letras']);

        $validator
            ->scalar('role')
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->scalar('token')
            ->allowEmpty('token');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['codigo']));
        $rules->add($rules->existsIn(['company_id'], 'Company'));
        $rules->add($rules->existsIn(['sucursal_id'], 'Sucursal'));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query->where(['active' => 1])->contain(['Company.Sucursal']);

        return $query;
    }

    public function recoverPassword($id){
        $user = $this->get($id);
        return $user->password;
    }

    /**
     * beforeDelete callback
     *
     * @param $cascade boolean
     * @return boolean
     */
        public function beforeDelete($event, $entity, $options) {
            if($entity->role == 'sa'){
                return false; 
            }
        }
}
