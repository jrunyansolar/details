<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Option Entity
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $type
 * @property string $value
 * @property string $identifier_key
 *
 * @property \App\Model\Entity\Option $parent_option
 * @property \App\Model\Entity\Option[] $child_options
 * @property \App\Model\Entity\ProductOption[] $product_options
 */
class Option extends Entity
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
