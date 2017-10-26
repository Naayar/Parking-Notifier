<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Company Controller
 *
 * @property \App\Model\Table\CompanyTable $Company
 *
 * @method \App\Model\Entity\Company[] paginate($object = null, array $settings = [])
 */
class CompanyController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ciudad']
        ];
        $company = $this->paginate($this->Company);

        $this->set(compact('company'));
        $this->set('_serialize', ['company']);
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Company->get($id, [
            'contain' => ['Ciudad', 'Sucursal', 'Users']
        ]);
        $sucursal = $this->Company->Sucursal->find('all')->where(['Company_id' => $id])->order(['name' => 'ASC']);

        $this->set('company', $company);
        $this->set('sucursal', $sucursal);
        $this->set('_serialize', ['company']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $company = $this->Company->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Company->patchEntity($company, $this->request->getData());
            if ($this->Company->save($company)) {
                $this->Flash->success(__('La empresa ha sido creada.'));

                return $this->redirect(['controller' => 'sucursal', 'action' => 'add']);
            }
            $this->Flash->error(__('La empresa no ha sido creada. Por favor intente nuevamente.'));
        }
        $ciudad = $this->Company->Ciudad->find('list', ['limit' => 200]);
        $this->set(compact('company', 'ciudad'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Company->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Company->patchEntity($company, $this->request->getData());
            if ($this->Company->save($company)) {
                $this->Flash->success(__('La empresa ha sido guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La empresa no ha podido ser guardada. Por favor intente nuevamente.'));
        }
        $ciudad = $this->Company->Ciudad->find('list', ['limit' => 200]);
        $this->set(compact('company', 'ciudad'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Company->get($id);
        if ($this->Company->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
