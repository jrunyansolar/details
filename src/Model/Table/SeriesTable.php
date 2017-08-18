<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Series Model
 *
 * @property \App\Model\Table\ProductsTable|\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\SeriesProductTable|\Cake\ORM\Association\HasMany $SeriesProduct
 *
 * @method \App\Model\Entity\Series get($primaryKey, $options = [])
 * @method \App\Model\Entity\Series newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Series[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Series|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Series patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Series[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Series findOrCreate($search, callable $callback = null, $options = [])
 */
class SeriesTable extends Table
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

        $this->setTable('series');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Products', [
            'foreignKey' => 'series_id'
        ]);
        $this->hasMany('SeriesProduct', [
            'foreignKey' => 'series_id'
        ]);
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
            ->allowEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('identifier_key');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
