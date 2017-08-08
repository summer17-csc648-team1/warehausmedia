<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('UserID');
        $this->setPrimaryKey('UserID');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('UserID')
            ->allowEmpty('UserID', 'create');

        $validator
            ->requirePresence('Username', 'create')
            ->notEmpty('Username');

        $validator
            ->requirePresence('Password', 'create')
            ->notEmpty('Password');

        $validator
            ->allowEmpty('Role');

        $validator
            ->allowEmpty('Email');

        return $validator;
    }

    public function findMyStuffs(Query $query, array $options){
        $userID = $options['userID'];

//        //get username
//        $users = TableRegistry::get("users");
//        $Username = $users->find()
//            ->where(['User1' => $userID]);

        //get messages
        $messages = TableRegistry::get('messages');
        $msgToMe = $messages->find()
            ->where(['User2' => $userID]);

        //get images
        $media = TableRegistry::get('media');
        $myImages = $media->find()
            ->where(['user_id'=>$userID]);

        return ['messages' => $msgToMe, 'images' => $myImages];
    }

}
