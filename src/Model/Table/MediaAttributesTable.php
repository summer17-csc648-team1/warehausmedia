<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MediaAttributes Model
 *
 * @method \App\Model\Entity\MediaAttribute get($primaryKey, $options = [])
 * @method \App\Model\Entity\MediaAttribute newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MediaAttribute[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MediaAttribute|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MediaAttribute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MediaAttribute[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MediaAttribute findOrCreate($search, callable $callback = null, $options = [])
 */
class MediaAttributesTable extends Table
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

        $this->setTable('media_attributes');
        $this->setDisplayField('MediaID');
        $this->setPrimaryKey('MediaID');
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
            ->allowEmpty('Media_Attributes');

        return $validator;
    }
}
