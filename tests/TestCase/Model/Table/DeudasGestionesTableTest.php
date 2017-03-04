<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeudasGestionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeudasGestionesTable Test Case
 */
class DeudasGestionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DeudasGestionesTable
     */
    public $DeudasGestiones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.deudas_gestiones',
        'app.deudas',
        'app.deudores',
        'app.carteras',
        'app.empresas',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DeudasGestiones') ? [] : ['className' => 'App\Model\Table\DeudasGestionesTable'];
        $this->DeudasGestiones = TableRegistry::get('DeudasGestiones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DeudasGestiones);

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
