<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SeriesOptions Model
 *
 * @property \App\Model\Table\SeriesTable|\Cake\ORM\Association\BelongsTo $Series
 * @property \App\Model\Table\OptionsTable|\Cake\ORM\Association\BelongsTo $Options
 *
 * @method \App\Model\Entity\SeriesOption get($primaryKey, $options = [])
 * @method \App\Model\Entity\SeriesOption newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SeriesOption[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SeriesOption|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SeriesOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SeriesOption[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SeriesOption findOrCreate($search, callable $callback = null, $options = [])
 */
class SeriesOptionsTable extends Table
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

        $this->setTable('series_options');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Series', [
            'foreignKey' => 'series_id'
        ]);
        $this->belongsTo('Options', [
            'foreignKey' => 'options_id'
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
        $rules->add($rules->existsIn(['series_id'], 'Series'));
        $rules->add($rules->existsIn(['options_id'], 'Options'));

        return $rules;
    }
}
