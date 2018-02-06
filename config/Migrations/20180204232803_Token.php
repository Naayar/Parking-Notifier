<?php
use Migrations\AbstractMigration;

class Token extends AbstractMigration
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
        $table = $this->table('token');
        $table->addColumn('value', 'string', [
            'null' => false,
        ]);
        $table->addColumn('active', 'boolean', [
            'default' => 0,
        ]);
        $table->create();

        $refTable = $this->table('token');
        $refTable->addColumn('user_id', 'integer')->addForeignKey('user_id', 'users','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->update();
    }
}
