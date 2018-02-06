<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('codigo', 'string', [
            'null' => false,
        ])->addIndex(['codigo'], ['unique' => 'true']);
        $table->addColumn('cedula', 'string', [
            'null' => false,
        ])->addIndex(['cedula'], ['unique' => 'true']);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('lastName', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('phone', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('password', 'string');
        $table->addColumn('role', 'enum', array('values' => 'admin, sa, user, staff'));
        $table->addColumn('active', 'boolean', [
            'default' => 1,
        ]);
        $table->addColumn('created','datetime');
        $table->addColumn('modified','datetime');
        $table->create();

        $refTable = $this->table('users');
        $refTable->addColumn('company_id', 'integer', array('signed' => 'disable'))->addForeignKey('company_id', 'company','id', array('delete' => 'CASCADE','update' => 'NO_ACTION'));
        $refTable->addColumn('sucursal_id', 'integer', array('signed' => 'disable', 'null' => true))->addForeignKey('sucursal_id', 'sucursal', 'id', array('delete' => 'CASCADE', 'update' => 'NO_ACTION'));

        $refTable->update();
    }
}
