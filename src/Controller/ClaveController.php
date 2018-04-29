<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
/**
 * Clave Controller
 *
 *
 * @method \App\Model\Entity\Clave[] paginate($object = null, array $settings = [])
 */
class ClaveController extends AppController
{

    /**
    * Autoriza a los usuarios de tipo user y staff solo a ciertos metodos
    */
    public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] === 'admin'){
            if(in_array($this->request->action, ['add'])){
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
        $clave = $this->paginate($this->Clave);

        $this->set(compact('clave'));
        $this->set('_serialize', ['clave']);
    }

    /**
     * View method
     *
     * @param string|null $id Clave id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clave = $this->Clave->get($id, [
            'contain' => []
        ]);

        $this->set('clave', $clave);
        $this->set('_serialize', ['clave']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clave = $this->Clave->newEntity();
        if ($this->request->is('post')) {
            $clave = $this->Clave->patchEntity($clave, $this->request->getData());
            $clave->active = 1;
            $clave->company_id = $this->Auth->user('company_id');
            if ($this->Clave->save($clave)) {
                $this->Flash->success(__('La clave ha sido generada.'));
                $email = new Email();
                $email->from(['cngarcia@gmail.com' => 'Parking Notifier'])
                    ->to($clave->email)
                    ->subject('Contraseña')
                    ->template('clave')
                    ->emailFormat('html')
                    ->viewVars(['value' => $clave])
                    ->send();
                return $this->redirect(['controller' => 'users', 'action' => 'home']);
            }
            $this->Flash->error(__('La clave no ha podido ser generada. Por favor intente nuevamente.'));
        }
        $this->set(compact('clave'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Clave id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clave = $this->Clave->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clave = $this->Clave->patchEntity($clave, $this->request->getData());
            if ($this->Clave->save($clave)) {
                $this->Flash->success(__('The clave has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clave could not be saved. Please, try again.'));
        }
        $this->set(compact('clave'));
        $this->set('_serialize', ['clave']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clave id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clave = $this->Clave->get($id);
        if ($this->Clave->delete($clave)) {
            $this->Flash->success(__('The clave has been deleted.'));
        } else {
            $this->Flash->error(__('The clave could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
