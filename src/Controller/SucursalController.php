<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Sucursal Controller
 *
 * @property \App\Model\Table\SucursalTable $Sucursal
 *
 * @method \App\Model\Entity\Sucursal[] paginate($object = null, array $settings = [])
 */
class SucursalController extends AppController
{

    /**
    *   Autoriza a un usuario no autentificado a acceder a ciertos metodos
    */
    public function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['firstadd']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Company']
        ];
        $sucursal = $this->paginate($this->Sucursal);

        $this->set(compact('sucursal'));
        $this->set('_serialize', ['sucursal']);
    }

    /**
     * View method
     *
     * @param string|null $id Sucursal id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sucursal = $this->Sucursal->get($id, [
            'contain' => ['Company']
        ]);

        $this->set('sucursal', $sucursal);
        $this->set('_serialize', ['sucursal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idCompany = null)
    {
        $sucursal = $this->Sucursal->newEntity();
        if ($this->request->is('post')) {
            $sucursal = $this->Sucursal->patchEntity($sucursal, $this->request->getData());
            $sucursal->company_id = $idCompany;
            if ($this->Sucursal->save($sucursal)) {
                $this->Flash->success(__('La sucursal ha sido creada.'));

                return $this->redirect(['controller'=> 'Users', 'action' => 'add', $sucursal->id, $idCompany]);
            }
            $this->Flash->error(__('La sucursal no ha podido ser creada. Por favor intente nuevamente.'));
        }

        $this->set('sucursal');
    }

    /**
     * Edit method
     *
     * @param string|null $id Sucursal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sucursal = $this->Sucursal->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sucursal = $this->Sucursal->patchEntity($sucursal, $this->request->getData());
            if ($this->Sucursal->save($sucursal)) {
                $this->Flash->success(__('Los datos han sido guardados.'));

                return $this->redirect(['controller' => 'Company','action' => 'view', $sucursal->company_id]);
            }
            $this->Flash->error(__('Los datos de usuario no has sido guardados. Por favor intente nuevamente.'));
        }
        $company = $this->Sucursal->Company->find('list', ['limit' => 200]);
        $this->set(compact('sucursal', 'company'));
        $this->set('_serialize', ['sucursal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sucursal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sucursal = $this->Sucursal->get($id);
        if ($this->Sucursal->delete($sucursal)) {
            $this->Flash->success(__('The sucursal has been deleted.'));
        } else {
            $this->Flash->error(__('The sucursal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
    *
    *
    */
    public function firstadd($id){
        $user = TableRegistry::get('Users');
        $sucursal = $this->Sucursal->find('all')->where(['company_id' => $this->Auth->user('company_id'),'id !=' => 1]);
        if($this->request->is(['post'])){
            $sucursal_id = $this->request->getData('id');

            $user->query()->update()
            ->set(['sucursal_id' => $sucursal_id])
            ->where(['id' => $this->Auth->user('id')])
            ->execute();

            $this->Flash->success(__('Oficina seleccionada. Por favor agrega tu vehiculo'));
            return $this->redirect(['controller' => 'Vehiculo', 'action' => 'firstadd']);
        }
        $this->set(compact('sucursal'));
    }
}
