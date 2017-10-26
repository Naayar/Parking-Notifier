<?php
use Migrations\AbstractMigration;

class CreateVehiculo extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('vehiculo');
        $table->addColumn('placa', 'string', [
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('marca', 'string', [
            'limit' => 30,
            'null' => false,
        ]);
        $table->addColumn('tipo', 'enum', array('values' => 'Carro, Moto'));
        $table->addColumn('created','datetime');
        $table->addColumn('modified','datetime');
        $table->create();

        $refTable = $this->table('vehiculo');
        $refTable->addColumn('user_id', 'integer', array('signed' => 'disable'))->addForeignKey('user_id', 'users','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->update();
    }
}
