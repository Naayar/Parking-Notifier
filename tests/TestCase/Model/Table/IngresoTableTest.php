<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IngresoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IngresoTable Test Case
 */
class IngresoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IngresoTable
     */
    public $Ingreso;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ingreso',
        'app.users',
        'app.company',
        'app.ciudad',
        'app.clave',
        'app.sucursal',
        'app.notificacion',
        'app.reporte',
        'app.evento',
        'app.evento_notificacion',
        'app.users',
        'app.vehiculo',
        'app.token',
        'app.medio',
        'app.users_medio'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ingreso') ? [] : ['className' => IngresoTable::class];
        $this->Ingreso = TableRegistry::get('Ingreso', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ingreso);

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
