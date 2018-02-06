<?php
use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $hasher = new DefaultPasswordHasher();
        $password = $hasher->hash('1234');
        $data = [
            [
                'codigo' => '20141578033',
                'cedula' => '1024570518',
                'name' => 'Cristian Nicolas',
                'lastName' => 'Garcia Garcia',
                'phone' => '',
                'email' => 'cristanico@hotmail.com',
                'password' => $password,
                'role' => 'sa',
                'token' => '',
                'active' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'company_id' => 1,
                'sucursal_id' => 1,
            ],
            [
                'codigo' => '20141578091',
                'cedula' => '1024564654',
                'name' => 'Brayan Daniel',
                'lastName' => 'Navarro Ortiz',
                'phone' => '',
                'email' => 'bdno1996@hotmail.com',
                'password' => $password,
                'role' => 'sa',
                'token' => '',
                'active' => 1,
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'company_id' => 1,
                'sucursal_id' => 1,
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
