<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
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

        $this->setTable('media');
        $this->setDisplayField('MediaID');
        $this->setPrimaryKey(['MediaID', 'Users_UserID']);
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
            ->integer('Categories_Category_ID')
            ->requirePresence('Categories_Category_ID', 'create')
            ->notEmpty('Categories_Category_ID');

        $validator
            ->integer('Users_UserID')
            ->allowEmpty('Users_UserID', 'create');

        return $validator;
    }
}
