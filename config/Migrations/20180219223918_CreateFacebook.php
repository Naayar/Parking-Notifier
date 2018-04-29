<?php
use Migrations\AbstractMigration;

class CreateFacebook extends AbstractMigration
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
        $refTable = $this->table('users');
        $refTable->addColumn('fbid', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $refTable->addColumn('fbfullname', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $refTable->update();

    }
}
