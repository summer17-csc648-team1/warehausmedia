<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Media Entity
 *
 * @property int $MediaID
 * @property string $Title
 * @property string $FileLocation
 * @property string $ThumbnailLocation
 * @property string $MediaType
 * @property string $Format
 * @property \Cake\I18n\FrozenTime $DateUploaded
 * @property float $Price
 * @property int $Categories_Category_ID
 * @property int $Users_UserID
 */
class Media extends Entity
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
        'MediaID' => false
    ];
}
