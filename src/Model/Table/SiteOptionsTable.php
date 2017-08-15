<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SiteOptions Model
 *
 * @method \App\Model\Entity\SiteOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\SiteOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SiteOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SiteOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SiteOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SiteOption findOrCreate($search, callable $callback = null, $options = [])
 */
class SiteOptionsTable extends Table
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

        $this->setTable('site_options');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('value');

        return $validator;
    }
}
