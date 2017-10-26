<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notificacion Model
 *
 * @property \App\Model\Table\ReporteTable|\Cake\ORM\Association\HasMany $Reporte
 * @property \App\Model\Table\EventoTable|\Cake\ORM\Association\BelongsToMany $Evento
 *
 * @method \App\Model\Entity\Notificacion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Notificacion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Notificacion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Notificacion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Notificacion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Notificacion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Notificacion findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NotificacionTable extends Table
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

        $this->setTable('notificacion');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Reporte', [
            'foreignKey' => 'notificacion_id'
        ]);
        $this->belongsToMany('Evento', [
            'foreignKey' => 'notificacion_id',
            'targetForeignKey' => 'evento_id',
            'joinTable' => 'evento_notificacion'
        ]);

        $this->belongsTo('users', [
            'foreignKey' => 'user_id_origen',
            'foreignKey' => 'user_id_destino'
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
            ->dateTime('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        $validator
            ->integer('user_id_origen')
            ->requirePresence('user_id_origen', 'create')
            ->notEmpty('user_id_origen');

        $validator
            ->integer('user_id_destino')
            ->requirePresence('user_id_destino', 'create')
            ->notEmpty('user_id_destino');

        return $validator;
    }
}
