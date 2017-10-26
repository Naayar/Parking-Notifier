<?php
use Migrations\AbstractSeed;

/**
 * Company seed.
 */
class CompanySeed extends AbstractSeed
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
                'name' => 'Parking Notifier',
                'phone' => '',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
                'ciudad_id' => 1,
            ]
        ];

        $table = $this->table('company');
        $table->insert($data)->save();
    }
}
