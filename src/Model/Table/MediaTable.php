<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Media Model
 *
 * @method \App\Model\Entity\Media get($primaryKey, $options = [])
 * @method \App\Model\Entity\Media newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Media[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Media|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Media patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Media[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Media findOrCreate($search, callable $callback = null, $options = [])
 */
class MediaTable extends Table
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

        $this->belongsTo('Categories');
        $this->belongsTo('Users');

        $this->setTable('media');
        $this->setDisplayField('MediaID');
        $this->setPrimaryKey(['MediaID', 'user_id']);
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
            ->integer('MediaID')
            ->allowEmpty('MediaID', 'create');

        $validator
            ->allowEmpty('Title');

        $validator
            ->allowEmpty('FileLocation');

        $validator
            ->allowEmpty('ThumbnailLocation');

        $validator
            ->allowEmpty('MediaType');

        $validator
            ->allowEmpty('Format');

        $validator
            ->dateTime('DateUploaded')
            ->allowEmpty('DateUploaded');

        $validator
            ->decimal('Price')
            ->allowEmpty('Price');

        $validator
            ->integer('category_id')
            ->requirePresence('category_id', 'create')
            ->notEmpty('category_id');

        $validator
            ->integer('user_id')
            ->allowEmpty('user_id', 'create');

        return $validator;
    }

    /**
     * @param Query $query
     * @param array $options
     * User choose a category (can be empty) then type search string to search by title and category
     * if category is empty/default, search by title only.
     * Return all media found.
     */
    public function homeSearch(Query $query, array $options){
        $Media = $this->find()
            ->select(['MediaID','Title', 'FileLocation', 'ThumbnailLocation', 'DateUploaded', 'Price', 'Category', 'Username', 'Email'])
            ->innerJoinWith('Users')
            ->where(['Media.User_UserID'=>'User.UserID']);

        if(!empty($options['category'])){
            $Media
                ->innerJoinWith('Categories')
                ->where(['Media.Categories_Category_ID'=>'Categories.CategoryID']);
        }

        return $Media.group(['MediaID']);
    }

    public function findByTitle(Query $query, array $options){
        die('test findByTitle');
    }


    public function findByID(Query $query, array $options){
        //die('test find by ID');
        $id = $options['id'];

        $target = $this->find('all')
            ->select(['Media.Title', 'Media.FileLocation','Media.Price', 'Media.user_id', 'Media.Description', 'Categories.Category', 'Users.Username'])
            ->where(['Media.MediaID'=>$id])
            ->leftJoinWith('Categories')
            ->leftJoinWith('Users');



        return $target;
    }

}
