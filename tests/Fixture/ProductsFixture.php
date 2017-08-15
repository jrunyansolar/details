<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 *
 */
class ProductsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'series_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'product_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'material_type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dwg_path' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'pdf_path' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'order' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_products_product_type_id' => ['type' => 'index', 'columns' => ['product_type_id'], 'length' => []],
            'FK_products_series_id' => ['type' => 'index', 'columns' => ['series_id'], 'length' => []],
            'FK_products_material_type_id' => ['type' => 'index', 'columns' => ['material_type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'name' => ['type' => 'unique', 'columns' => ['name'], 'length' => []],
            'FK_products_material_type_id' => ['type' => 'foreign', 'columns' => ['material_type_id'], 'references' => ['material_types', 'id'], 'update' => 'restrict', 'delete' => 'noAction', 'length' => []],
            'FK_products_product_type_id' => ['type' => 'foreign', 'columns' => ['product_type_id'], 'references' => ['product_types', 'id'], 'update' => 'restrict', 'delete' => 'noAction', 'length' => []],
            'FK_products_series_id' => ['type' => 'foreign', 'columns' => ['series_id'], 'references' => ['series', 'id'], 'update' => 'restrict', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'series_id' => 1,
            'product_type_id' => 1,
            'material_type_id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'dwg_path' => 'Lorem ipsum dolor sit amet',
            'pdf_path' => 'Lorem ipsum dolor sit amet',
            'order' => 1
        ],
    ];
}
