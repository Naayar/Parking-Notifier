<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class LoginfbController extends AppController
{
     public function beforeFilter(Event $event)
    {
        \Cake\Event\EventManager::instance()->on('HybridAuth.newUser', [$this, 'createUser']);
    }
 
    public function createUser(Event $event) {
        // Entity representing record in social_profiles table
        $profile = $event->data()['profile'];
 
        $user = $this->newEntity([
            'email' => $profile->email,
            'password' => time()
        ]);
        $user = $this->save($user);
 
        if (!$user) {
            throw new \RuntimeException('Unable to save new user');
        }
 
        return $user;
    }
 
    }