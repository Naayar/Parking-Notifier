<?php
use Migrations\AbstractMigration;

class CreateReporte extends AbstractMigration
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
        $table = $this->table('reporte');
        $table->addColumn('fecha', 'datetime', [
            'null' => false,
        ]);
        $table->addColumn('created','datetime');
        $table->addColumn('modified','datetime');
        $table->create();

        $refTable = $this->table('reporte');
        $refTable->addColumn('notificacion_id', 'integer', array('signed' => 'disable'))->addForeignKey('notificacion_id', 'notificacion','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->addColumn('ingreso_id', 'integer', array('signed' => 'disable'))->addForeignKey('ingreso_id', 'ingreso','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->update();
    }
}
