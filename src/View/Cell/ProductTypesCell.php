<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * ProductTypes cell
 */
class ProductTypesCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->ProductTypes = $this->loadModel('ProductTypes');
        $productTypes = $this->ProductTypes->find('all')->toArray();

        $this->set('productTypes', $productTypes);
        $this->set('_serialize', ['productTypes']);
    }
}
