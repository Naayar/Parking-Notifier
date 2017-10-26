<?php
use Migrations\AbstractMigration;

class CreateEventoNotificacion extends AbstractMigration
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
        $table = $this->table('evento_notificacion');
        $table->addColumn('evento_id','integer', ['signed' => 'disable']);
        $table->addColumn('notificacion_id', 'integer', ['signed' => 'disable']);
        $table->create();

        $refTable = $this->table('evento_notificacion');
        $refTable->addForeignKey('evento_id', 'evento', 'id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->addForeignKey('notificacion_id', 'notificacion', 'id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->update();
    }
}
