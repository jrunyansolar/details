<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SeriesProductTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SeriesProductTable Test Case
 */
class SeriesProductTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SeriesProductTable
     */
    public $SeriesProduct;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.series_product',
        'app.series',
        'app.products',
        'app.product_types',
        'app.product_material_type'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SeriesProduct') ? [] : ['className' => SeriesProductTable::class];
        $this->SeriesProduct = TableRegistry::get('SeriesProduct', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SeriesProduct);

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
