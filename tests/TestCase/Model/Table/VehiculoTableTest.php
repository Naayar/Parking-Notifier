<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehiculoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehiculoTable Test Case
 */
class VehiculoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehiculoTable
     */
    public $Vehiculo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehiculo',
        'app.users',
        'app.company',
        'app.ciudad',
        'app.clave',
        'app.sucursal',
        'app.ingreso',
        'app.sucursals',
        'app.user_medio'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vehiculo') ? [] : ['className' => VehiculoTable::class];
        $this->Vehiculo = TableRegistry::get('Vehiculo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehiculo);

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
