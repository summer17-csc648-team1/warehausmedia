<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MediaAttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MediaAttributesTable Test Case
 */
class MediaAttributesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MediaAttributesTable
     */
    public $MediaAttributes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.media_attributes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MediaAttributes') ? [] : ['className' => MediaAttributesTable::class];
        $this->MediaAttributes = TableRegistry::get('MediaAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MediaAttributes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
