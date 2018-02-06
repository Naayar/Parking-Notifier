<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Database\Connection;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{


    /**
    * Autoriza a los usuarios de tipo user y staff solo a ciertos metodos
    */
    public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] === 'user'){
            if(in_array($this->request->action, ['home', 'logout', 'view2','edit2'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'staff'){
            if(in_array($this->request->action, ['home', 'logout', 'view2', 'edit2'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'admin'){
            if(in_array($this->request->action, ['home', 'logout', 'add2', 'view2','edit2', 'add3'])){
                return true;
            }
        }


        return parent::isAuthorized($user);
    }


    /**
    *   Autoriza a un usuario no autentificado a acceder a ciertos metodos
    */
    public function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['add2', 'start','recover', 'resetPassword']);
    }


    /**
    * login
    */
    public function login()
    {
        $u = $this->Users->findByEmail($this->request->getData('email'))->first();
        if ($this->request->is('post')) {
                $user = $this->Auth->identify();
                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                }else {
                    
                    echo $this->Flash->error('Datos invalidos',['Key' => 'auth']);
                } 
        }
    }

    /**
    * metodo principal de un usuario autentificado
    */
    public function home()
    {
        $users = $this->Users->find('all')->where(['role =' => 'user', 'Company_id' => $this->Auth->user('company_id')])->contain(['Company']);
        $staff = $this->Users->find('all')->where(['role =' => 'staff', 'Company_id' => $this->Auth->user('company_id')])->contain(['Company']);
        $vehiculo = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->contain(['vehiculo']);
        $notify = $this->Users->find('all')->where(['id' => $this->Auth->user('id')])->contain(['notificacion']);

        $this->set('users', $users);
        $this->set('staff', $staff);
        $this->set('vehiculo', $vehiculo);
        $this->set('notify', $notify);
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * Metodo para listar usuarios administradores - rol = SA
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        
        $users = $this->paginate($this->Users->find('all')->where(['role !=' => 'sa'])->contain(['Company']));
        $this->set('users', $users);
 
 
    }

    /**
     * View method
     *
     * Metodo para ver el detalle de usuarios administradores - rol = SA
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($user)
    {
        $users = $this->Users->find('all')->where(['Users.id' => $user])->contain(['Company']);
        $this->set('users', $users);
    }

    /**
     * Add method
     *
     * Metodo para ver el detalle de cualquier usuario
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function view2($user)
    {
        $users = $this->Users->find('all')->where(['Users.id' => $user])->contain(['Company']);
        $this->set('users', $users);
    }


    /**
    *  Metodo para crear un nuevo administrador - rol = SA
    */
    public function add($idsucursal = null,$idCompany = null)
    {
        $user = $this->Users->newEntity();
        $users = $this->Users->Company->find('list')->where(['id !=' => 3])->order(['name' => 'ASC']);
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $clave = $this->request->getData('clave');
            $user->role = 'admin';
            $user->active = 1;
            $user->sucursal_id = $idsucursal;
            $user->company_id = $idCompany;
            if ($this->Users->save($user)) {

                $email = new Email();
                $email->from(['cngarcia@gmail.com' => 'Parking Notifier'])
                    ->to($user->email)
                    ->subject('Registro Exitoso')
                    ->template('welcome')
                    ->emailFormat('html')
                    ->viewVars(['value' => $clave])
                    ->send();

                $this->Flash->success(__('El usuario ha sido creado.'));

                return $this->redirect(['controller' => 'Company', 'action' => 'view', $idCompany]);
            }
            $this->Flash->error(__('El usuario no ha podido ser creado. Por favor intente nuevamente.'));
        }
        $this->set(compact('user', 'users'));
        $this->set('_serialize', ['user']);
    }


    /**
    * Metodo para crear un nuevo usuario de tipo user - rol = null
    */
    public function add2()
    {
        $claveinput = $this->request->getData('clave');
        $emailinput = $this->request->getData('email');
        $c = TableRegistry::get('clave');
        $clave = $c->find()->where(['valor' => $claveinput, 'email' => $emailinput])->first();
        $user = $this->Users->newEntity();
        $users = $this->Users->Company->find('list')->where(['id !=' => 3])->order(['name' => 'ASC']);
        if ($this->request->is('post')) {
            if(!empty($clave->active) && $clave->active == true){

                $user = $this->Users->patchEntity($user, $this->request->getData());
                $user->role = 'user';
                $user->active = 1;
                $user->sucursal_id =1 ;
                $user->company_id = $clave->company_id;
                if ($this->Users->save($user)) {

                    $query = $c->query();
                    $query->update()
                        ->set(['active' => 0])
                        ->where(['id' => $clave->id])
                        ->execute();

                    if ($this->request->is('post')) {
                        $user = $this->Auth->identify();
                        if ($user) {
                            $email = new Email();
                            $email->from(['numeroceroseis@hotmail.com' => 'Parking Notifier'])
                                ->to($user->email)
                                ->subject('Registro Exitoso')
                                ->template('newUser')
                                ->emailFormat('html')
                                ->send();

                            $this->Auth->setUser($user);
                            $this->Flash->success(__('El usuario ha sido creado. Por favor selecciona tu oficina'));
                            return $this->redirect(['controller' => 'Sucursal', 'action' => 'firstadd', $$user->company_id]);
                        }else {
                            echo $this->Flash->error('No se ha podido iniciar sesion');
                        } 
                    }

                    return $this->redirect(['controller' => 'vehiculo', 'action' => 'firstadd']);
                }
                $this->Flash->error(__('El usuario no ha podido ser creado. Por favor intente nuevamente.'));
            }
            $this->Flash->error(__('Clave de empresa no valida. Por favor intente nuevamente o solicite una nueva'));

        }
        $this->set(compact('user', 'users'));

    }

    /**
    *  Metodo para crear un nuevo administrador - rol = SA
    */
    public function add3()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $clave = $this->request->getData('clave');
            $user->role = 'staff';
            $user->active = 1;
            $user->company_id = $this->Auth->user('company_id');
            debug($user->company_id);
            if ($this->Users->save($user)) {

                $email = new Email();
                $email->from(['cngarcia@gmail.com' => 'Parking Notifier'])
                    ->to($user->email)
                    ->subject('Registro Exitoso')
                    ->template('welcome')
                    ->emailFormat('html')
                    ->viewVars(['value' => $clave])
                    ->send();

                $this->Flash->success(__('El usuario ha sido creado.'));

                return $this->redirect(['action' => 'home']);
            }
            $this->Flash->error(__('El usuario no ha podido ser creado. Por favor intente nuevamente.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * Metodo para editar los datos de un administrador - rol = SA
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Company']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Los datos han sido guardados.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('Los datos de usuario no has sido guardados. Por favor intente nuevamente.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }


    /**
    * Metodo para editar los datos de cualquier usuario - rol = null
    */
    public function edit2($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Company']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Los datos han sido guardados.'));

                return $this->redirect(['action' => 'view2', $id]);
            }
            $this->Flash->error(__('Los datos de usuario no has sido guardados. Por favor intente nuevamente .'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     * 
     * Metodo para desactivar o activar un administrador/usuario - rol = undefined
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Company']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Acción completada con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Los datos de usuario no han podido ser enviados. Por favor intente nuevamente .'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        
    }

    /**
    * Metodo para la vista de la raiz del proyecto
    */
    public function start()
    {
        $this->render();
    }


    /**
    * Metodo para el autocompletado de la busqueda con Ajax
    */
    public function searchjson($term = null)
    {
        
        if(!empty($this->request->query['term']))
        {
            $term = $this->request->query['term'];
            $terms = explode(' ', trim($term));
            $terms = array_diff($terms, array(''));
            foreach($terms as $term)
            {
                $conditions[] = array('CONCAT_WS(Users.name, Users.lastName, Users.codigo) LIKE' => '%' . $term . '%');
            }
            
            $platillos = $this->Users->find('all', array('recursive' => -1, 'fields' => array('Users.id', 'Users.codigo' ,'Users.name', 'Users.lastName'), 'conditions' => $conditions, 'limit' => 20))->where(['role !=' => 'sa']);

        }
        echo json_encode($platillos);
        $this->autoRender = false;
    }


    /**
    * Metodo para busqueda - rol = SA
    */
    public function search()
    {
        $search = null;
        if (!empty($this->request->query['search'])) {
            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));

            foreach($terms as $term)
            {
                $terms1[] = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
                $conditions[] = array('CONCAT_WS(Users.name, Users.lastName, Users.codigo) LIKE' => '%' . $term . '%');
            }

            $users = $this->Users->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 200))->where(['role !=' => 'sa'])->contain(['Company']);

            $terms1= array_diff($terms1, array(''));
            $this->set('users', $users);
        }

        $this->set(compact('search'));

    }

    /**
    * Metodo para cambiar la contraseña en caso de olvidarla - rol = all
    */
    public function resetPassword(){
        $id = $_GET['id'];
        $token = $_GET['token'];
        $user = $this->Users->findById($id)->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (($token != null) && ($user->token != null)) {
                $pass = $this->request->getData('pass');
                $pass1 = $this->request->getData('pass1');
                if($pass == $pass1){
                    if(strcmp($user->token,$token) === 0){
                        $user->token=null;
                        if ($this->Users->save($user)) {
                            $this->Flash->success(__('La contraseña ha sido actualizada.'));

                            return $this->redirect(['action' => 'login']);
                        }
                        $this->Flash->error(__('La nueva contraseña no ha sido guardada. Por favor intente nuevamente.'));
                    }else{
                        $this->Flash->error(__('Se ha producido un error al intentar restablecer la contraseña. Por favor asegurese de estar escribiendo correctamente la url.'));
                        return $this->redirect(['action' => 'login']);
                    }
                }else{
                    $this->Flash->error(__('Las contraseñas no coninciden. Por favor intente nuevamente.'));
                }
            }else{
                $this->Flash->error(__('Ya ha realizado este proceso anteriormente. Por favor inicie sesión.'));
                return $this->redirect(['action' => 'login']);
            }
        }
    }

    /**
    * Metodo para enviar correo electronico para restablecer la contraseña- rol = all
    */
    public function recover(){
        $correo = $this->request->getData('email');
        $token = $this->request->getData('token');

        if ($this->request->is('post')) {
            $user = $this->Users->findByEmail($correo)->first();
            if (!$user) {
                $this->Flash->error(__('El correo electronico no existe. Por favor intente nuevamente.'));
            } else {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $user = $this->Users->patchEntity($user, $this->request->getData());
                    if ($this->Users->save($user)) {

                    $email = new Email();
                    $email->from(['cngarciag@hotmail.com' => 'Parking Notifier'])
                        ->to($correo)
                        ->subject('Solicitud Recuperar Contraseña')
                        ->template('recover')
                        ->emailFormat('html')
                        ->viewVars(['token' => $token, 'user' => $user->id, 'name' => $user->name])
                        ->send();
                    
                    $this->Flash->success(__('Por favor verifique su correo electronico para restablecer la contraseña'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                    }
                    $this->Flash->error(__('El correo electronico no pudo ser enviado. Por favor intente nuevamente.'));
                }
            }
        }
    }
}
