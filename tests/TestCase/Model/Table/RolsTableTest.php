<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolsTable Test Case
 */
class RolsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RolsTable
     */
    public $Rols;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rols',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rols') ? [] : ['className' => 'App\Model\Table\RolsTable'];
        $this->Rols = TableRegistry::get('Rols', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rols);

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
