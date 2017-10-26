<?php
use Migrations\AbstractMigration;

class CreateEvento extends AbstractMigration
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
        $table = $this->table('evento');
        $table->addColumn('descripcion', 'string', [
            'limit' => 50,
            'null' => false,
        ]);
        $table->addColumn('created','datetime');
        $table->addColumn('modified','datetime');
        $table->create();
    }
}
