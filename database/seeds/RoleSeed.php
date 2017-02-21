<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrator (can create other users)',],
            ['id' => 3, 'title' => 'Sales',],
            ['id' => 4, 'title' => 'Marketing',],
            ['id' => 5, 'title' => 'SDR',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
