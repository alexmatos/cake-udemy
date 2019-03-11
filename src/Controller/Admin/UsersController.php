<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 26/02/19
 * Time: 09:45
 */

namespace App\Controller\Admin;

use App\Controller\AppController;

class UsersController extends AppController
{
    public function index ()
    {
        $this->paginate = [
            'limit' => 3,
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

    public function edit($id = null)
    {
        $user = $this->Users->get($id);

        if($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if($this->Users->save($user)) {
                $this->Flash->success('Usuário editado com sucesso!');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Erro ao editar usuário!');
            }
        }

        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        if($this->Users->delete($user)) {
            $this->Flash->success('Usuário apagado com sucesso');
        } else {
            $this->Flash->error('Erro ao apagar usuário');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if($this->request->is('post')) {
            $user = $this->Auth->identify();
            if($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}