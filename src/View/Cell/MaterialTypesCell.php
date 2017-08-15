<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * MaterialTypes cell
 */
class MaterialTypesCell extends Cell
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
        $this->MaterialTypes = $this->loadModel('MaterialTypes');
        $materialTypes = $this->MaterialTypes->find('all')->toArray();

        $this->set('materialTypes', $materialTypes);
        $this->set('_serialize', ['materialTypes']);
    }
}
