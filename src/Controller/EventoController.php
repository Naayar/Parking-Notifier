<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Evento Controller
 *
 *
 * @method \App\Model\Entity\Evento[] paginate($object = null, array $settings = [])
 */
class EventoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $evento = $this->paginate($this->Evento);

        $this->set(compact('evento'));
        $this->set('_serialize', ['evento']);
    }

    /**
     * View method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evento = $this->Evento->get($id, [
            'contain' => []
        ]);

        $this->set('evento', $evento);
        $this->set('_serialize', ['evento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $evento = $this->Evento->newEntity();
        if ($this->request->is('post')) {
            $evento = $this->Evento->patchEntity($evento, $this->request->getData());
            if ($this->Evento->save($evento)) {
                $this->Flash->success(__('El evento ha sido creado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El evento no pudo ser creado. Por favor intente nuevamnete.'));
        }
        $this->set(compact('evento'));
        $this->set('_serialize', ['evento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evento = $this->Evento->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evento = $this->Evento->patchEntity($evento, $this->request->getData());
            if ($this->Evento->save($evento)) {
                $this->Flash->success(__('El evento ha sido creado'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El evento no pudo ser guardado. Por favor intente nuevamnete.'));
        }
        $this->set(compact('evento'));
        $this->set('_serialize', ['evento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Evento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evento = $this->Evento->get($id);
        if ($this->Evento->delete($evento)) {
            $this->Flash->success(__('The evento has been deleted.'));
        } else {
            $this->Flash->error(__('The evento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
