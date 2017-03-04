<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeudasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeudasTable Test Case
 */
class DeudasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeudasTable
     */
    public $Deudas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deudas',
        'app.deudores',
        'app.carteras',
        'app.empresas',
        'app.users',
        'app.roles',
        'app.deudas_gestiones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Deudas') ? [] : ['className' => 'App\Model\Table\DeudasTable'];
        $this->Deudas = TableRegistry::get('Deudas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Deudas);

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
