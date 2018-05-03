<?php

namespace App\Controller;

//require 'vendor/autoload.php';

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Database\Connection;
use Cake\Mailer\Email;
use Cake\I18n\Time;
use Cake\I18n\Date;



/**
 * Notificacion Controller
 *
 *
 * @method \App\Model\Entity\Notificacion[] paginate($object = null, array $settings = [])
 */
class NotificacionController extends AppController
{
    /**
    * Autoriza a los usuarios de tipo user y staff solo a ciertos metodos
    */
    public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] === 'user'){
            if(in_array($this->request->action, ['view2'])){
                return true;
            }
        }

        if(isset($user['role']) && $user['role'] === 'staff'){
            if(in_array($this->request->action, ['add'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'admin'){
            if(in_array($this->request->action, ['index', 'view','viewadmin'])){
                return true;
            }
        }

        return parent::isAuthorized($user);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user =TableRegistry::get('users');
        $notificacion = $this->paginate($this->Notificacion->find('all')->contain(['users'])->where(['company_id' => $this->Auth->user('company_id')]));
        foreach ($notificacion as $noti) {
            $user1[] = $user->get($noti->user_id_origen);
            $user2[] = $user->get($noti->user_id_destino);
        }


        $this->set(compact('notificacion'));
        $this->set(compact('user1'));
        $this->set(compact('user2'));
    }

    /**
     * View method
     *
     * @param string|null $id Notificacion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificacion = $this->Notificacion->get($id, [
            'contain' => 'evento'
        ]);

        //$evento = TableRegistry::get('evento')->find('all')->contain('notificacion');
        $users = TableRegistry::get('Users');
        $userOrigen = $users->get($notificacion->user_id_origen);
        $userDestino = $users->get($notificacion->user_id_destino);

        $this->set('notificacion', $notificacion);
        $this->set('userOrigen', $userOrigen);
        $this->set('userDestino', $userDestino);
    }

    /**
     * View2 method
     *
     * @param string|null $id Notificacion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view2($id = null)
    {
        $notificacion = $this->Notificacion->get($id, [
            'contain' => 'evento'
        ]);

        //$evento = TableRegistry::get('evento')->find('all')->contain('notificacion');
        $users = TableRegistry::get('Users');
        $userDestino = $users->get($notificacion->user_id_destino);

        $this->set('notificacion', $notificacion);
        $this->set('userDestino', $userDestino);
    }


    public function viewadmin()
    {
        $user = TableRegistry::get('users');
        $notify = $user->find('all')->where(['id' => $this->Auth->user('id')])->contain(['notificacion']);
        $this->set('notify', $notify);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notificacion = $this->Notificacion->newEntity();
        $eventoos = TableRegistry::get('evento')->find('all');
        $ingresos = TableRegistry::get('ingreso');
        $now = new Time();
        $now->timezone = 'America/Bogota';

        if ($this->request->is('post')) {
            $placa = $this->request->getData('placa');
            $descri = $this->request->getData('otro');
            $vehiculo = TableRegistry::get('vehiculo')->find('all')->where(['vehiculo.placa' => $placa])->contain(['users'])->first();
            if($vehiculo){
            $user = TableRegistry::get('users')->get($vehiculo->user_id);
            $ingreso = $ingresos->find()->where(['user_id' => $user->id, 'validador' => 1, 'day(entrada)' => $now->day, 'month(entrada)' => $now->month, 'year(entrada)' => $now->year, 'sucursal_id' => $this->Auth->user('sucursal_id')])->last();
            if($ingreso){
                $medios = TableRegistry::get('medio')->find()->matching('Users', function($q){
                    return $q;
                })->where(['UsersMedio.active' => 1,'Users.id' => $vehiculo->user_id]);

                $eventos = array();
                for ($i=1; $i<=4 ; $i++) { 
                    if(isset($_POST[$i]) ){
                        if($_POST[$i] != '0'){
                            $eventos[] = $i;
                        }

                    }
                }

                if($medios){

                    foreach ($medios as $m) {
                        if($m->id == 1){

                            $email = new Email();
                            $email->from(['cngarcia@gmail.com' => 'Parking Notifier'])
                                ->to($user->email)
                                ->subject('Alerta vehiculo')
                                ->template('notificacion')
                                ->emailFormat('html')
                                ->viewVars(['eventos' => $eventos, 'otro' => $descri, 'user' => $user->name, 'fecha' => $now, 'placa' => $placa])
                                ->send();
                            $this->Flash->success(__('La notificación al correo ha sido enviada con exito.'));

                        }else if($m->id == 3){
                            $sns = \Aws\Sns\SnsClient::factory(array(
                                'credentials' => [
                                    'key'    => 'AKIAIGSSCIACXX3BBKFA',
                                    'secret' => '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',
                                ],
                                'region' => 'us-east-1',
                                'version'  => 'latest',
                            ));
                            $nmsm=explode(" ", $user->name);
                            $result = $sns->publish([
                                'Message' => 'ParkingNotifier Hola '.$nmsm[0].' se ha presentado un inconveniente con su vehículo acercarse al parqueadero Gracias
                                ', // REQUIRED
                                'MessageAttributes' => [
                                    'AWS.SNS.SMS.SenderID' => [
                                        'DataType' => 'String', // REQUIRED
                                        'StringValue' => 'nyan'
                                    ],
                                    'AWS.SNS.SMS.SMSType' => [
                                        'DataType' => 'String', // REQUIRED
                                        'StringValue' => 'Transactional' // or 'Promotional'
                                    ]
                                ],
                                'PhoneNumber' => '57'.$user->phone,
                            ]);
                            error_log($result);
                            $this->Flash->success(__('La notificación via mensaje de texto (SMS) ha sido enviada.'));
                        }
                    }
                    $notificacion = $this->Notificacion->patchEntity($notificacion, $this->request->getData());
                    $notificacion->fecha = $now;
                    $notificacion->user_id_origen = $this->Auth->user('id');
                    $notificacion->user_id_destino = $user->id;
                    if ($this->Notificacion->save($notificacion)) {

                        $evento_notificacion = TableRegistry::get('evento_notificacion');

                        for ($i=1; $i<=4 ; $i++) { 
                            if(isset($_POST[$i]) ){
                                if($_POST[$i] != '0'){
                                    $evento = TableRegistry::get('evento')->get($i);
                                    $this->Notificacion->Evento->link($notificacion, [$evento]);
                                }

                            }
                        }
                        return $this->redirect(['controller' => 'ingreso','action' => 'add']);
                    }
                    $this->Flash->error(__('La notificación al correo no pudo ser enviada. Intente nuevamente'));

                }else{
                    $this->Flash->error(__('El usuario no tiene seleccioando nigún medio de envio, no fue posible enviar la notificación'));
                    return $this->redirect(['action' => 'add']);
                }
            }else{
                $this->Flash->error(__('El vehiculo no ha ingresado al parqueadero'));
                return $this->redirect(['action' => 'add']);
            }
            }else{
                $this->Flash->error(__('El vehiculo no esta registrado en la base de datos'));
                return $this->redirect(['action' => 'add']);
            }



            
        }
        $this->set(compact('notificacion'));
        $this->set(compact('eventos'));
        $this->set(compact('eventoos'));
        $this->set(compact('vehiculo'));
        $this->set(compact('medios'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Notificacion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificacion = $this->Notificacion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificacion = $this->Notificacion->patchEntity($notificacion, $this->request->getData());
            if ($this->Notificacion->save($notificacion)) {
                $this->Flash->success(__('The notificacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificacion could not be saved. Please, try again.'));
        }
        $this->set(compact('notificacion'));
        $this->set('_serialize', ['notificacion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notificacion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificacion = $this->Notificacion->get($id);
        if ($this->Notificacion->delete($notificacion)) {
            $this->Flash->success(__('The notificacion has been deleted.'));
        } else {
            $this->Flash->error(__('The notificacion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
