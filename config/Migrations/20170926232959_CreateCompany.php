<?php
use Migrations\AbstractMigration;

class CreateCompany extends AbstractMigration
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
        $table = $this->table('company');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('phone', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('created','datetime');
        $table->addColumn('modified','datetime');
        $table->create();

        $refTable = $this->table('company');
        $refTable->addColumn('ciudad_id', 'integer', array('signed' => 'disable'))->addForeignKey('ciudad_id', 'ciudad','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'))->update();
    }
}
