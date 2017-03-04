<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstadosDeudasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstadosDeudasTable Test Case
 */
class EstadosDeudasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EstadosDeudasTable
     */
    public $EstadosDeudas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.estados_deudas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EstadosDeudas') ? [] : ['className' => 'App\Model\Table\EstadosDeudasTable'];
        $this->EstadosDeudas = TableRegistry::get('EstadosDeudas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EstadosDeudas);

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
