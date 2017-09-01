<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Series cell
 */
class SeriesCell extends Cell
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
        $this->Series = $this->loadModel('Series');
        $series = $this->Series->find('all')->toArray();

        $this->set('series', $series);
        $this->set('_serialize', ['series']);
    }
}
