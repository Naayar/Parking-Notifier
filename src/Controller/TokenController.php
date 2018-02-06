<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Database\Connection;

/**
 * Token Controller
 *
 * @property \App\Model\Table\TokenTable $Token
 *
 * @method \App\Model\Entity\Token[] paginate($object = null, array $settings = [])
 */
class TokenController extends AppController
{

    /**
    *   Autoriza a un usuario no autentificado a acceder a ciertos metodos
    */
    public function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
        $this->Auth->allow(['recover']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $token = $this->paginate($this->Token);

        $this->set(compact('token'));
        $this->set('_serialize', ['token']);
    }

    
    /**
    * Metodo para enviar correo electronico para restablecer la contraseña- rol = all
    */
    public function recover(){
        $correo = $this->request->getData('email');
        $tok = $this->request->getData('value');
        $token = $this->Token->newEntity(); 
        if ($this->request->is('post')) {
            $user = TableRegistry::get('users')->findByEmail($correo)->first();
            if (!$user) {
                $this->Flash->error(__('El correo electronico no existe. Por favor intente nuevamente.'));
            } else {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $token = $this->Token->patchEntity($token, $this->request->getData());
                    $token->active = 0;
                    $token->user_id = $user->id;
                    if ($this->Token->save($token)) {

                    $email = new Email();
                    $email->from(['cngarciag@hotmail.com' => 'Parking Notifier'])
                        ->to($correo)
                        ->subject('Solicitud Recuperar Contraseña')
                        ->template('recover')
                        ->emailFormat('html')
                        ->viewVars(['token' => $tok, 'user' => $user->id, 'name' => $user->name])
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
