<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SeriesOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SeriesOptionsTable Test Case
 */
class SeriesOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SeriesOptionsTable
     */
    public $SeriesOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.series_options',
        'app.series',
        'app.products',
        'app.product_types',
        'app.material_types',
        'app.product_material_type',
        'app.series_product',
        'app.options'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SeriesOptions') ? [] : ['className' => SeriesOptionsTable::class];
        $this->SeriesOptions = TableRegistry::get('SeriesOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SeriesOptions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
