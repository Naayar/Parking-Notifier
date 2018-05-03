<?php
namespace App\Controller;

//require 'vendor/autoload.php';

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Database\Connection;
use Cake\Mailer\Email;
use Cake\I18n\Time;
use Cake\I18n\Date;


/**
 * Reporte Controller
 *
 *
 * @method \App\Model\Entity\Reporte[] paginate($object = null, array $settings = [])
 */
/**
    * Autoriza a los usuarios de tipo user, staff y admin solo a ciertos metodos
    */
class ReporteController extends AppController {

	public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] === 'user'){
            if(in_array($this->request->action, ['view','index'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'admin'){
            if(in_array($this->request->action, ['view','index'])){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] === 'staff'){
            if(in_array($this->request->action, ['view','index'])){
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


    }

    
}