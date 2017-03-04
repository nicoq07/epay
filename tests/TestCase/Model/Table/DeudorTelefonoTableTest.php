<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeudorTelefonoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeudorTelefonoTable Test Case
 */
class DeudorTelefonoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeudorTelefonoTable
     */
    public $DeudorTelefono;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deudor_telefono',
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
        $config = TableRegistry::exists('DeudorTelefono') ? [] : ['className' => 'App\Model\Table\DeudorTelefonoTable'];
        $this->DeudorTelefono = TableRegistry::get('DeudorTelefono', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeudorTelefono);

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
