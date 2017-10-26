<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotificacionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotificacionTable Test Case
 */
class NotificacionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NotificacionTable
     */
    public $Notificacion;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.notificacion',
        'app.reporte',
        'app.evento',
        'app.evento_notificacion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Notificacion') ? [] : ['className' => NotificacionTable::class];
        $this->Notificacion = TableRegistry::get('Notificacion', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Notificacion);

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
