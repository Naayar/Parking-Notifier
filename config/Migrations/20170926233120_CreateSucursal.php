<?php
use Migrations\AbstractMigration;

class CreateSucursal extends AbstractMigration
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
        $table = $this->table('sucursal');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('phone', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => true,
        ]);
        $table->addColumn('address', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('created','datetime');
        $table->addColumn('modified','datetime');
        $table->create();

        $reftable = $this->table('sucursal');
        $reftable->addColumn('company_id', 'integer', array('signed' => 'disable'))->addForeignKey('company_id', 'company', 'id', array('delete' => 'CASCADE','update' => 'NO_ACTION'))->update();
    }
}
