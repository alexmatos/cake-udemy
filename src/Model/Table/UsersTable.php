<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('users');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'created');

        $validator
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);


        return $validator;
    }
}