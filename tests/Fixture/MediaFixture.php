<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MediaFixture
 *
 */
class MediaFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'MediaID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Title' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'FileLocation' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'ThumbnailLocation' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'MediaType' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Format' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'DateUploaded' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Price' => ['type' => 'decimal', 'length' => 11, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'Categories_Category_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Users_UserID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_Media_Categories1_idx' => ['type' => 'index', 'columns' => ['Categories_Category_ID'], 'length' => []],
            'fk_Media_User1_idx' => ['type' => 'index', 'columns' => ['Users_UserID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['MediaID', 'Users_UserID'], 'length' => []],
            'fk_Media_Categories1' => ['type' => 'foreign', 'columns' => ['Categories_Category_ID'], 'references' => ['Categories', 'CategoryID'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Media_User1' => ['type' => 'foreign', 'columns' => ['Users_UserID'], 'references' => ['Users', 'UserID'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'MediaID' => 1,
            'Title' => 'Lorem ipsum dolor sit amet',
            'FileLocation' => 'Lorem ipsum dolor sit amet',
            'ThumbnailLocation' => 'Lorem ipsum dolor sit amet',
            'MediaType' => 'Lorem ipsum dolor sit amet',
            'Format' => 'Lorem ipsum dolor sit amet',
            'DateUploaded' => '2017-07-27 02:19:09',
            'Price' => 1.5,
            'Categories_Category_ID' => 1,
            'Users_UserID' => 1
        ],
    ];
}
