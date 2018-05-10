<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Medio Controller
 *
 *
 * @method \App\Model\Entity\Medio[] paginate($object = null, array $settings = [])
 */
class MedioController extends AppController
{
    /**
    * Autoriza a los usuarios de tipo user y staff solo a ciertos metodos
    *bueno probemos esta vaina 
    * Autoriza a los usuarios de tipo user, admin y staff solo a ciertos metodos
    */
    public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] === 'user'){
            if(in_array($this->request->action, ['index', 'edit2', 'edit3'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'admin'){
            if(in_array($this->request->action, ['index', 'edit2','edit3'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'staff'){
            if(in_array($this->request->action, ['index', 'edit2', 'edit3'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'staff'){
            if(in_array($this->request->action, ['index', 'edit2'])){
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
        $medios = $this->Medio->find();
        $medios->matching('Users', function($q){
            return $q->where(['UsersMedio.active' => 1,'Users.id' => $this->Auth->user('id')]);
        });
        $this->set('medios', $medios);
    }


    public function isFacebookLogin(){
        
    }
    
    /**
     * 
     *
     * @return \Cake\Http\Response|void
     */
    public function lista()
    {
        $medio = $this->paginate($this->Medio);

        $this->set(compact('medio'));
        $this->set('_serialize', ['medio']);
    }

    /**
     * View method
     *
     * @param string|null $id Medio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $medio = $this->Medio->get($id, [
            'contain' => []
        ]);

        $this->set('medio', $medio);
        $this->set('_serialize', ['medio']);
    }

    /**
     * Metodo mediante el cual el sa añade nuevos medios
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $medio = $this->Medio->newEntity();
        if ($this->request->is('post')) {
            $medio = $this->Medio->patchEntity($medio, $this->request->getData());
            if ($this->Medio->save($medio)) {
                $this->Flash->success(__('El medio ha sido creado.'));

                return $this->redirect(['action' => 'lista']);
            }
            $this->Flash->error(__('El medio no ha podido ser creado. Por favor intente nuevamente.'));
        }
        $this->set(compact('medio'));
        $this->set('_serialize', ['medio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Medio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $medio = $this->Medio->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $medio = $this->Medio->patchEntity($medio, $this->request->getData());
            if ($this->Medio->save($medio)) {
                $this->Flash->success(__('El medio ha sido guardado.'));

                return $this->redirect(['action' => 'lista']);
            }
            $this->Flash->error(__('El medio no ha podido ser guardado. Por favor, intente nuevamente.'));
        }
        $this->set(compact('medio'));
        $this->set('_serialize', ['medio']);
    }
    
    /**
     * Edit2 method
     *
     * @param string|null $id Medio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
 public function edit2($id)
    {
        $medios = $this->Medio->find('all')->where(['id' => 1]);
        $user = TableRegistry::get('Users')->get($this->Auth->user('id'));
        $idmedioactive = 3;
        $medioactive = $this->Medio->get($idmedioactive);
        $user_med = TableRegistry::get('users_medio');
        $usermed = TableRegistry::get('users_medio')->find('all')->where(['medio_id' => $medioactive->id, 'user_id' => $user->id])->first();
        if ($this->request->is('post')) {
            if(isset($_POST['phone'])){
                $numero = $this->request->getData('phone');
                $users = TableRegistry::get('Users');
                $query = $users->query()->update()
                    ->set(['phone' => $numero])
                    ->where(['id' => $this->Auth->user('id')])
                    ->execute();

                $idmedio = 3;
                $medio = $this->Medio->get($idmedio);

                $user_medio = TableRegistry::get('users_medio');
                $usermedio = TableRegistry::get('users_medio')->find()->where(['medio_id' => $medio->id, 'user_id' => $user->id])->first();

                if($usermedio){
                    if($usermedio->active == 0){
                        $user_medio->query()->update()
                        ->set(['active' => 1])
                        ->where(['user_id' => $user->id, 'medio_id' => $medio->id])
                        ->execute();
                        $this->Flash->success(__('El medio '.$medio->nombre.' ha sido seleccionado satisfactoriamente.'));
                    }else{
                        $user_medio->query()->update()
                        ->set(['active' => 0])
                        ->where(['user_id' => $user->id, 'medio_id' => $medio->id])
                        ->execute();
                        $this->Flash->success(__('El medio '.$medio->nombre.' ha sido desactivado satisfactoriamente.'));
                    }
                }else{
                    $this->Medio->Users->link($medio, [$user]);
                    $user_medio->query()->update()
                        ->set(['active' => 1])
                        ->where(['user_id' => $user->id, 'medio_id' => $medio->id])
                        ->execute();
                    $this->Flash->success(__('El medio'.$medio->nombre.' ha sido seleccionado satisfactoriamente.'));
                }

            }else{
                $idmedio = $this->request->getData('id');
                $medio = $this->Medio->get($idmedio);

                $user_medio = TableRegistry::get('users_medio');
                $usermedio = TableRegistry::get('users_medio')->find()->where(['medio_id' => $medio->id, 'user_id' => $user->id])->first();

                if($usermedio){
                    if($usermedio->active == 0){
                        $user_medio->query()->update()
                        ->set(['active' => 1])
                        ->where(['user_id' => $user->id, 'medio_id' => $medio->id])
                        ->execute();
                        $this->Flash->success(__('El medio '.$medio->nombre.' ha sido seleccionado satisfactoriamente.'));
                    }else{
                        $user_medio->query()->update()
                        ->set(['active' => 0])
                        ->where(['user_id' => $user->id, 'medio_id' => $medio->id])
                        ->execute();
                        $this->Flash->success(__('El medio '.$medio->nombre.' ha sido desactivado satisfactoriamente.'));
                    }
                }else{
                    $this->Medio->Users->link($medio, [$user]);
                    $user_medio->query()->update()
                        ->set(['active' => 1])
                        ->where(['user_id' => $user->id, 'medio_id' => $medio->id])
                        ->execute();
                    $this->Flash->success(__('El medio'.$medio->nombre.' ha sido seleccionado satisfactoriamente.'));
                }
            }

        }
        $this->set(compact('medios'));
        $this->set(compact('user'));
        $this->set(compact('usermed'));
    }

    public function edit3()
    {
        $numero = $this->request->getData('phone');
        $medios = $this->Medio->find('all')->where(['id' => 1]);
        $users = TableRegistry::get('Users');
        $user = TableRegistry::get('Users')->get($this->Auth->user('id'));
        if ($this->request->is('post')) {
            $idmedio = $this->request->getData('id');
            $medio = $this->Medio->get($idmedio);

            $query = $users->query()->update()
            ->set(['phone' => $numero])
            ->where(['id' => $this->Auth->user('id')])
            ->execute();

            $user_medio = TableRegistry::get('users_medio');
            $usermedio = TableRegistry::get('users_medio')->find()->where(['medio_id' => $medio->id, 'user_id' => $user->id])->first();

            if($usermedio){
                if($usermedio->active == 0){
                    $user_medio->query()->update()
                    ->set(['active' => 1])
                    ->where(['user_id' => $user->id, 'medio_id' => $medio->id])
                    ->execute();
                    $this->Flash->success(__('El medio '.$medio->nombre.' ha sido seleccionado satisfactoriamente.'));
                    return $this->redirect(['action' => 'edit2',$this->Auth->user('id')]);
                }else{
                    $user_medio->query()->update()
                    ->set(['active' => 0])
                    ->where(['user_id' => $user->id, 'medio_id' => $medio->id])
                    ->execute();
                    $this->Flash->success(__('El medio '.$medio->nombre.' ha sido desactivado satisfactoriamente.'));
                    return $this->redirect(['action' => 'edit2',$this->Auth->user('id')]);
                }
            }else{
                $this->Medio->Users->link($medio, [$user]);
                $user_medio->query()->update()
                    ->set(['active' => 1])
                    ->where(['user_id' => $user->id, 'medio_id' => $medio->id])
                    ->execute();
                $this->Flash->success(__('El medio'.$medio->nombre.' ha sido seleccionado satisfactoriamente.'));
                return $this->redirect(['action' => 'edit2',$this->Auth->user('id')]);
            }

            
        }




        $this->autoRender = false;
        
    }

    /**
     * Delete method
     *
     * @param string|null $id Medio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $medio = $this->Medio->get($id);
        if ($this->Medio->delete($medio)) {
            $this->Flash->success(__('The medio has been deleted.'));
        } else {
            $this->Flash->error(__('The medio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
