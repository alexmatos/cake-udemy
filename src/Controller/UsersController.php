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

}