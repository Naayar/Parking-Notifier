<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TokenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TokenTable Test Case
 */
class TokenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TokenTable
     */
    public $Token;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.token',
        'app.users',
        'app.company',
        'app.ciudad',
        'app.clave',
        'app.sucursal',
        'app.ingreso',
        'app.notificacion',
        'app.reporte',
        'app.evento',
        'app.evento_notificacion',
        'app.users',
        'app.vehiculo',
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
        $config = TableRegistry::exists('Token') ? [] : ['className' => TokenTable::class];
        $this->Token = TableRegistry::get('Token', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Token);

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
