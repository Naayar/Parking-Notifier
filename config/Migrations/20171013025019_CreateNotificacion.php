<?php
use Migrations\AbstractMigration;

class CreateNotificacion extends AbstractMigration
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
        $table = $this->table('notificacion');
        $table->addColumn('fecha', 'datetime', [
            'null' => false,
        ]);
        $table->addColumn('created','datetime');
        $table->addColumn('modified','datetime');
        $table->create();

        $refTable = $this->table('notificacion');
        $refTable->addColumn('user_id_origen', 'integer', array('signed' => 'disable'))->addForeignKey('user_id_origen', 'users','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->addColumn('user_id_destino', 'integer', array('signed' => 'disable'))->addForeignKey('user_id_destino', 'users','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->update();
    }
}
