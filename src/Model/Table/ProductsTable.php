<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\SeriesTable|\Cake\ORM\Association\BelongsTo $Series
 * @property \App\Model\Table\ProductTypesTable|\Cake\ORM\Association\BelongsTo $ProductTypes
 * @property \App\Model\Table\MaterialTypesTable|\Cake\ORM\Association\BelongsTo $MaterialTypes
 * @property \App\Model\Table\ProductMaterialTypeTable|\Cake\ORM\Association\HasMany $ProductMaterialType
 * @property |\Cake\ORM\Association\HasMany $ProductOptions
 * @property \App\Model\Table\SeriesProductTable|\Cake\ORM\Association\HasMany $SeriesProduct
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Series', [
            'foreignKey' => 'series_id'
        ]);
        $this->belongsTo('ProductTypes', [
            'foreignKey' => 'product_type_id'
        ]);
        $this->belongsTo('MaterialTypes', [
            'foreignKey' => 'material_type_id'
        ]);
        $this->hasMany('ProductMaterialType', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('ProductOptions', [
            'foreignKey' => 'product_id'
        ]);
        $this->hasMany('SeriesProduct', [
            'foreignKey' => 'product_id'
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
            ->allowEmpty('dwg_path');

        $validator
            ->allowEmpty('pdf_path');

        $validator
            ->integer('order')
            ->allowEmpty('order');

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
        $rules->add($rules->existsIn(['series_id'], 'Series'));
        $rules->add($rules->existsIn(['product_type_id'], 'ProductTypes'));
        $rules->add($rules->existsIn(['material_type_id'], 'MaterialTypes'));

        return $rules;
    }
}
