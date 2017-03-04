<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeudoresTelefonosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeudoresTelefonosTable Test Case
 */
class DeudoresTelefonosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeudoresTelefonosTable
     */
    public $DeudoresTelefonos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deudores_telefonos',
        'app.deudores',
        'app.deudas',
        'app.carteras',
        'app.empresas',
        'app.users',
        'app.roles',
        'app.deudas_gestiones',
        'app.deudores_telefonos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DeudoresTelefonos') ? [] : ['className' => 'App\Model\Table\DeudoresTelefonosTable'];
        $this->DeudoresTelefonos = TableRegistry::get('DeudoresTelefonos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeudoresTelefonos);

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
