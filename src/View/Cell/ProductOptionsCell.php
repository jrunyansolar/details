<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * ProductOptions cell
 */
class ProductOptionsCell extends Cell
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
    public function display($columns=false)
    {
        $this->Options = $this->loadModel('Options');
        $options = $this->Options->find('all')->where('parent_id is null')->contain(['ChildOptions'])->toList();

        $this->set('productOptions', $options);
        $this->set('columns', $columns);
        
        $this->set('_serialize', ['productOptions','columns']);
    }
}
