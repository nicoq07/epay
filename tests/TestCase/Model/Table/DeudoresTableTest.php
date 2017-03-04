<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeudoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeudoresTable Test Case
 */
class DeudoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeudoresTable
     */
    public $Deudores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deudores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Deudores') ? [] : ['className' => 'App\Model\Table\DeudoresTable'];
        $this->Deudores = TableRegistry::get('Deudores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Deudores);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
