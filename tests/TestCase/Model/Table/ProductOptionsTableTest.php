<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductOptionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductOptionsTable Test Case
 */
class ProductOptionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductOptionsTable
     */
    public $ProductOptions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_options',
        'app.options',
        'app.series',
        'app.products',
        'app.product_types',
        'app.material_types',
        'app.product_material_type',
        'app.series_product',
        'app.series_options'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductOptions') ? [] : ['className' => ProductOptionsTable::class];
        $this->ProductOptions = TableRegistry::get('ProductOptions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductOptions);

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
