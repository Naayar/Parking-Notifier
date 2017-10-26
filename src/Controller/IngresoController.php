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
