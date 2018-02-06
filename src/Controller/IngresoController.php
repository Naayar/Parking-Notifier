<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ingreso Controller
 *
 *
 * @method \App\Model\Entity\Ingreso[] paginate($object = null, array $settings = [])
 */
class IngresoController extends AppController
{

    /**
    * Autoriza a los usuarios de tipo user y staff solo a ciertos metodos
    */
    public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] === 'user'){
            if(in_array($this->request->action, ['view', 'index'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'staff'){
            if(in_array($this->request->action, ['home', 'logout', 'view2', 'edit2'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'admin'){
            if(in_array($this->request->action, ['view'])){
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
        $ingreso = $this->paginate($this->Ingreso);

        $this->set(compact('ingreso'));
        $this->set('_serialize', ['ingreso']);
    }

    /**
     * View method
     *
     * @param string|null $id Ingreso id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingreso = $this->Ingreso->get($id, [
            'contain' => []
        ]);

        $this->set('ingreso', $ingreso);
        $this->set('_serialize', ['ingreso']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingreso = $this->Ingreso->newEntity();
        if ($this->request->is('post')) {
            $ingreso = $this->Ingreso->patchEntity($ingreso, $this->request->getData());
            if ($this->Ingreso->save($ingreso)) {
                $this->Flash->success(__('The ingreso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingreso could not be saved. Please, try again.'));
        }
        $this->set(compact('ingreso'));
        $this->set('_serialize', ['ingreso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingreso id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingreso = $this->Ingreso->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingreso = $this->Ingreso->patchEntity($ingreso, $this->request->getData());
            if ($this->Ingreso->save($ingreso)) {
                $this->Flash->success(__('The ingreso has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ingreso could not be saved. Please, try again.'));
        }
        $this->set(compact('ingreso'));
        $this->set('_serialize', ['ingreso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingreso id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingreso = $this->Ingreso->get($id);
        if ($this->Ingreso->delete($ingreso)) {
            $this->Flash->success(__('The ingreso has been deleted.'));
        } else {
            $this->Flash->error(__('The ingreso could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
