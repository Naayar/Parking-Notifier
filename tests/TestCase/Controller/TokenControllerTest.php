<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TokenController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TokenController Test Case
 */
class TokenControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
