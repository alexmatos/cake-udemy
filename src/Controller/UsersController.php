<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/02/19
 * Time: 09:45
 */

namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function index ()
    {
        $this->paginate = [
            'limit' => 1,
            'order' => [
                'Users.id' => 'desc'
            ]
        ];

        $usuarios = $this->paginate($this->Users);
        $this->set(compact('usuarios'));
    }

    public function view($id = null)
    {
        $usuario = $this->Users->get($id);

        $this->set(compact('usuario'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();

        if($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if($this->Users->save($user)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não foi possível cadastrar o usuário'));
            }
        }

        $this->set(compact('user'));
    }

}