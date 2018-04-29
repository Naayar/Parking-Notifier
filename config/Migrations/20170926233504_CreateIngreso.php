<?php
use Migrations\AbstractMigration;

class CreateIngreso extends AbstractMigration
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
        $table = $this->table('ingreso');
        $table->addColumn('entrada', 'datetime', [
            'null' => true,
        ]);

        $table->addColumn('salida', 'datetime', [
            'null' => true,
        ]);
        $table->addColumn('validador', 'boolean', [
            'default' => 0,
        ]);
        $table->addColumn('created','datetime');
        $table->addColumn('modified','datetime');
        $table->create();

        $refTable = $this->table('ingreso');
        $refTable->addColumn('user_id', 'integer', array('signed' => 'disable'))->addForeignKey('user_id', 'users','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->addColumn('sucursal_id', 'integer', array('signed' => 'disable'))->addForeignKey('sucursal_id', 'sucursal', 'id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->update();
    }
}
