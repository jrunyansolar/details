<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SeriesOption Entity
 *
 * @property int $id
 * @property int $series_id
 * @property int $options_id
 *
 * @property \App\Model\Entity\Series $series
 * @property \App\Model\Entity\Option $option
 */
class SeriesOption extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
