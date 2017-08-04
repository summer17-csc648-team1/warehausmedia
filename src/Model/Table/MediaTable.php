<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Log\Log;

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

        $this->setTable('Media');
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
            ->allowEmpty('MediaID', 'create')
            ->allowEmpty('MediaID', 'update');

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
            ->notEmpty('user_id', 'create');

        return $validator;
    }
    public function isOwnedBy($MediaId, $userId)
    {

        return $this->exists(['MediaID' => $MediaId, 'user_id' => $userId]);
    }
}
