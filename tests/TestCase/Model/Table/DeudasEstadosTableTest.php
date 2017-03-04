<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeudasEstadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeudasEstadosTable Test Case
 */
class DeudasEstadosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeudasEstadosTable
     */
    public $DeudasEstados;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deudas_estados'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DeudasEstados') ? [] : ['className' => 'App\Model\Table\DeudasEstadosTable'];
        $this->DeudasEstados = TableRegistry::get('DeudasEstados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeudasEstados);

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
