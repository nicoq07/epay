<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CarterasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CarterasTable Test Case
 */
class CarterasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CarterasTable
     */
    public $Carteras;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.carteras',
        'app.empresas',
        'app.deudas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Carteras') ? [] : ['className' => 'App\Model\Table\CarterasTable'];
        $this->Carteras = TableRegistry::get('Carteras', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Carteras);

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
