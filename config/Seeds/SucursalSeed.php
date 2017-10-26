<?php
use Migrations\AbstractSeed;

/**
 * Sucursal seed.
 */
class SucursalSeed extends AbstractSeed
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
        $data = [
            [
                'name' => 'No aplica',
                'phone' => '',
                'address' => '',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'company_id' => 1,
            ],
            [
                'name' => 'Sede principal',
                'phone' => '',
                'address' => '',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'company_id' => 1,
            ]
        ];

        $table = $this->table('sucursal');
        $table->insert($data)->save();
    }
}
