<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeudorTelefonosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeudorTelefonosTable Test Case
 */
class DeudorTelefonosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeudorTelefonosTable
     */
    public $DeudorTelefonos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deudor_telefonos',
        'app.deudores',
        'app.personas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DeudorTelefonos') ? [] : ['className' => 'App\Model\Table\DeudorTelefonosTable'];
        $this->DeudorTelefonos = TableRegistry::get('DeudorTelefonos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeudorTelefonos);

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
