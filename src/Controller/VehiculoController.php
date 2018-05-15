<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehiculo Controller
 *
 *
 * @method \App\Model\Entity\Vehiculo[] paginate($object = null, array $settings = [])
 */
class VehiculoController extends AppController
{

    public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] === 'user'){
            if(in_array($this->request->action, ['index','view','edit', 'delete', 'add','firstadd'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'admin'){
            if(in_array($this->request->action, ['index','view', 'add', 'delete','edit'])){
                return true;
            } 
        }
         if(isset($user['role']) && $user['role'] === 'staff'){
            if(in_array($this->request->action, ['index','view', 'add', 'delete','edit'])){
                return true;
            } 
        }
        if(isset($user['role']) && $user['role'] === 'staff'){
            if(in_array($this->request->action, ['index','view', 'add', 'delete','edit'])){
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
        $vehiculo = $this->Vehiculo->find('all');

        $this->set(compact('vehiculo'));
    }

    /**
     * View method
     *
     * @param string|null $id Vehiculo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiculo = $this->Vehiculo->find('all')->contain(['users'])->where(['Vehiculo.user_id' => $id]);

        $this->set('vehiculo', $vehiculo);
        $this->set('_serialize', ['vehiculo']);
        $this->set($id);
    }

    /**
     * Add method
     * @param string|null $id Vehiculo id.
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function add($id = null)
    {   
        $vehiculo = $this->Vehiculo->newEntity();
        if ($this->request->is('post')) {
            $vehiculo = $this->Vehiculo->patchEntity($vehiculo, $this->request->getData());
            $vehiculo->placa = strtoupper($vehiculo->placa);
            $vehiculo->user_id = $this->Auth->user('id');
            if ($this->Vehiculo->save($vehiculo)) {
                $this->Flash->success(__('El vehiculo ha sido guardado.'));

                return $this->redirect(['action' => 'view', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('El vehiculo no ha podido ser creado. Por favor intente nuevamente.'));
        }
        $vehic = $this->Vehiculo->find('all')->contain(['users'])->where(['Vehiculo.user_id' => $id]);

        $this->set(compact('vehiculo'));
        $this->set('vehic', $vehic);
        $this->set('omeee',$id);
    }

    /**
     * firstadd method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function firstadd()
    {   
        $vehiculo = $this->Vehiculo->newEntity();
        if ($this->request->is('post')) {
            $vehiculo = $this->Vehiculo->patchEntity($vehiculo, $this->request->getData());
            $vehiculo->placa = strtoupper($vehiculo->placa);
            $vehiculo->user_id = $this->Auth->user('id');
            if ($this->Vehiculo->save($vehiculo)) {
                $this->Flash->success(__('El vehiculo ha sido guardado. Por favor selecciona los medios por los cuales se te notificará'));

                return $this->redirect(['controller' => 'Medio', 'action' => 'edit2', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('El vehiculo no ha podido ser creado. Por favor intente nuevamente.'));
        }
        $this->set(compact('vehiculo'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Vehiculo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiculo = $this->Vehiculo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiculo = $this->Vehiculo->patchEntity($vehiculo, $this->request->getData());
            $vehiculo->placa = strtoupper($vehiculo->placa);
            if ($this->Vehiculo->save($vehiculo)) {
                $this->Flash->success(__('La información del vehiculo ha sido guardado.'));

                return $this->redirect(['action' => 'view', $this->Auth->user('id')]);
            }
            $this->Flash->error(__('El vehiculo no ha podido ser creado. Por favor intente nuevamente.'));
        }
        $this->set(compact('vehiculo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiculo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiculo = $this->Vehiculo->get($id);
        if ($this->Vehiculo->delete($vehiculo)) {
            $this->Flash->success(__('The vehiculo has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiculo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
