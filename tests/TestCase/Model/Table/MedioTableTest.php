<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MedioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MedioTable Test Case
 */
class MedioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MedioTable
     */
    public $Medio;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.medio',
        'app.users',
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
        $config = TableRegistry::exists('Medio') ? [] : ['className' => MedioTable::class];
        $this->Medio = TableRegistry::get('Medio', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Medio);

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
