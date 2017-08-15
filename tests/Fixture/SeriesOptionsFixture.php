<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SeriesOptionsFixture
 *
 */
class SeriesOptionsFixture extends TestFixture
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
        'options_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_series_options_series_id' => ['type' => 'index', 'columns' => ['series_id'], 'length' => []],
            'FK_series_options_options_id' => ['type' => 'index', 'columns' => ['options_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_series_options_options_id' => ['type' => 'foreign', 'columns' => ['options_id'], 'references' => ['options', 'id'], 'update' => 'restrict', 'delete' => 'noAction', 'length' => []],
            'FK_series_options_series_id' => ['type' => 'foreign', 'columns' => ['series_id'], 'references' => ['series', 'id'], 'update' => 'restrict', 'delete' => 'noAction', 'length' => []],
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
            'options_id' => 1
        ],
    ];
}
