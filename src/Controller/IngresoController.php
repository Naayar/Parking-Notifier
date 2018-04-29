<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Connection;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\I18n\Date;


/**
 * Ingreso Controller
 *
 *
 * @method \App\Model\Entity\Ingreso[] paginate($object = null, array $settings = [])
 */
class IngresoController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');
    }

    public $paginate = [
            'limit' => 10,
            'order' => [
                'Ingreso.id' => 'asc'
            ],
            'contain' => ['Sucursal']
        ];

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
            if(in_array($this->request->action, ['add'])){
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
        if($this->request->is('post')){
            $mes = $this->request->getData('mes');
            $año = $this->request->getData('ano');
            $mes = $mes +1;

            $registros = $this->paginate($this->Ingreso->find('all')->select(['id' => 'Ingreso.id', 'entrada' => 'Ingreso.entrada', 'salida' => 'Ingreso.salida', 'sucursal' => 'Sucursal.name'])->where(['YEAR(entrada)' => $año, 'MONTH(entrada)' => $mes, 'user_id' => $this->Auth->user('id')]));
            $this->set(compact('registros'));

        }
        $ingreso = $this->paginate($this->Ingreso->find('all')->where(['Ingreso.user_id' => $this->Auth->user('id')]));
        $this->set(compact('ingreso'));

    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   
        $now = new Time();
        $now->timezone = 'America/Bogota';
        $ingreso = $this->Ingreso->newEntity();
        if ($this->request->is('post')) {
            $codigo = $this->request->getData('user_codigo');
            $userid = TableRegistry::get('users')->find()->where(['codigo' => $codigo])->first();
            $sucursalid = $this->Auth->user('sucursal_id');
            if(!empty($userid) && ($userid->company_id == $this->Auth->user('company_id'))){
            $ingres = $this->Ingreso->find()->select(['id', 'dia' => 'day(entrada)', 'mes' => 'month(entrada)', 'ano' => 'year(entrada)'])->where(['user_id' => $userid->id, 'sucursal_id' => $sucursalid, 'validador' => 1])->order(['entrada' => 'DESC'])->first();
                    if(!empty($ingres) && ($ingres->dia == $now->day) && ($ingres->mes == $now->month) && ($ingres->ano == $now->year)){

                        $this->Ingreso->query()->update()
                        ->set(['salida' => $now, 'validador' => 0])
                        ->where(['id' => $ingres->id])
                        ->execute();

                        $this->Flash->success(__('El usuario ha salido Exitosamente'));
                        return $this->redirect(['action' => 'add']);

                    }else{

                    $ingreso = $this->Ingreso->patchEntity($ingreso, $this->request->getData());
                    $ingreso->user_id =  $userid->id;
                    $ingreso->sucursal_id = $sucursalid;
                    $ingreso->validador = 1;
                    $ingreso->entrada = $now;
                    if ($this->Ingreso->save($ingreso)) {
                        $this->Flash->success(__('Ingresado Exitosamente'));

                        return $this->redirect(['action' => 'add']);
                    }
                    $this->Flash->error(__('Error al intentar ingreso. Por favor intente nuevamente.'));
                    }
            }else{
                $this->Flash->error(__('Error al intentar ingreso. Por favor comuniquese con el administrador del sitio.'));
                return $this->redirect(['action' => 'add']);
            }
        }


        $this->set(compact('ingreso'));
        $this->set('_serialize', ['ingreso']);
    }

    public function invited(){
        $now = new Time();
        $now->timezone = 'America/Bogota';
        $ingreso = $this->Ingreso->newEntity();
        if ($this->request->is('post')) {
            $codigo = $this->request->getData('user_codigo');
            $userid = TableRegistry::get('users')->find()->where(['codigo' => 20141578033])->first();
            $sucursalid = $this->Auth->user('sucursal_id');
            $ingres = $this->Ingreso->find()->select(['id', 'dia' => 'day(entrada)', 'mes' => 'month(entrada)', 'ano' => 'year(entrada)'])->where(['user_id' => $userid->id, 'sucursal_id' => $sucursalid, 'validador' => 1])->order(['entrada' => 'DESC'])->first();
            if($userid && ($userid->company_id == $this->Auth->user('company_id'))){
                    if(($ingres->dia == $now->day) && ($ingres->mes == $now->month) && ($ingres->ano == $now->year)){

                        $this->Ingreso->query()->update()
                        ->set(['salida' => $now, 'validador' => 0])
                        ->where(['id' => $ingres->id])
                        ->execute();

                        $this->Flash->success(__('El usuario ha salido Exitosamente'));
                        return $this->redirect(['action' => 'add']);

                    }else{

                    $ingreso = $this->Ingreso->patchEntity($ingreso, $this->request->getData());
                    $ingreso->user_id =  $userid->id;
                    $ingreso->sucursal_id = $sucursalid;
                    $ingreso->validador = 1;
                    $ingreso->entrada = $now;
                    if ($this->Ingreso->save($ingreso)) {
                        $this->Flash->success(__('Ingresado Exitosamente'));

                        return $this->redirect(['action' => 'add']);
                    }
                    $this->Flash->error(__('Error al intentar ingreso. Por favor intente nuevamente.'));
                    }
            }else{
                $this->Flash->error(__('Error al intentar ingreso. Por favor comuniquese con el administrador del sitio.'));
                return $this->redirect(['action' => 'add']);
            }
        }

        
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
