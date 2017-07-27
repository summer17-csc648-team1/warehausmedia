<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransactionsFixture
 *
 */
class TransactionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'OrderDate' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'SoldBy' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'PurchasedBy' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_Transactions_User1_idx' => ['type' => 'index', 'columns' => ['SoldBy'], 'length' => []],
            'fk_Transactions_User2_idx' => ['type' => 'index', 'columns' => ['PurchasedBy'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['OrderDate', 'SoldBy', 'PurchasedBy'], 'length' => []],
            'fk_Transactions_User1' => ['type' => 'foreign', 'columns' => ['SoldBy'], 'references' => ['Users', 'UserID'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_Transactions_User2' => ['type' => 'foreign', 'columns' => ['PurchasedBy'], 'references' => ['Users', 'UserID'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'OrderDate' => '2017-07-27 02:19:41',
            'SoldBy' => 1,
            'PurchasedBy' => 1
        ],
    ];
}
