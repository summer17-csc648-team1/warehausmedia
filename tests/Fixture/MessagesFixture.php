<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MessagesFixture
 *
 */
class MessagesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'User1' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'User2' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Message' => ['type' => 'string', 'length' => 1000, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Date' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_Messages_User1_idx' => ['type' => 'index', 'columns' => ['User1'], 'length' => []],
            'fk_Messages_User2_idx' => ['type' => 'index', 'columns' => ['User2'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['User1', 'User2'], 'length' => []],
            'fk_Messages_User1' => ['type' => 'foreign', 'columns' => ['User1'], 'references' => ['Users', 'UserID'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Messages_User2' => ['type' => 'foreign', 'columns' => ['User2'], 'references' => ['Users', 'UserID'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'User1' => 1,
            'User2' => 1,
            'Message' => 'Lorem ipsum dolor sit amet',
            'Date' => '2017-07-27 02:23:02'
        ],
    ];
}
