<?php
use Migrations\AbstractMigration;

class CreateUsersMedio extends AbstractMigration
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
        $table = $this->table('users_medio');
        $table->create();

        $refTable = $this->table('users_medio');
        $refTable->addColumn('user_id', 'integer')->addForeignKey('user_id', 'users','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));

        $refTable->addColumn('medio_id', 'integer', array('signed' => 'disable'))->addForeignKey('medio_id', 'medio','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->addColumn('active', 'boolean');

        $refTable->update();
    }
}
