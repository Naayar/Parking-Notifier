<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
            if(in_array($this->request->action, ['index', 'view'])){
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
        $notificacion = $this->paginate($this->Notificacion->find('all')->contain(['users'])->where(['company_id' => $this->Auth->user('company_id')]));

        $this->set(compact('notificacion'));
        $this->set('_serialize', ['notificacion']);
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

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eve = TableRegistry::get('evento');
        $evento = $eve->find('all');
        $notificacion = $this->Notificacion->newEntity();
        if ($this->request->is('post')) {
            $notificacion = $this->Notificacion->patchEntity($notificacion, $this->request->getData());
            if ($this->Notificacion->save($notificacion)) {
                $this->Flash->success(__('The notificacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificacion could not be saved. Please, try again.'));
        }
        $this->set(compact('notificacion'));
        $this->set(compact('evento'));
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
