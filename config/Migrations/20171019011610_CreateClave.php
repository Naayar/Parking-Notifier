<?php
use Migrations\AbstractMigration;

class CreateClave extends AbstractMigration
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
        $table = $this->table('clave');

        $table->addColumn('valor','string', [
            'limit' => 16,
            'null'=> false,
        ]);
        $table->addColumn('active', 'boolean', [
            'default' => 1,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => false,
        ]);
        $table->addColumn('created','datetime');
        $table->addColumn('modified','datetime');
        $table->create();


        $refTable =  $this->table('clave');
        $refTable->addColumn('company_id', 'integer', array('signed' => 'disable'))->addForeignKey('company_id', 'company','id', array('delete' => 'NO_ACTION','update' => 'NO_ACTION'));
        $refTable->update();
    }
}
