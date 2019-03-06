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
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->requirePresence('username', 'create')
            ->allowEmptyString('username', false);

        $validator
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false);

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email'], 'E-mail já cadastrado'));
        $rules->add($rules->isUnique(['username'], 'Usuário já cadastrado'));

        return $rules;
    }

}