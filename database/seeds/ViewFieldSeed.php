<?php

use Illuminate\Database\Seeder;

class ViewFieldSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'field01', 'description' => null,],
            ['id' => 2, 'name' => 'field02', 'description' => 'some description',],
            ['id' => 3, 'name' => 'field03', 'description' => 'some descriptionfoe field 03',],

        ];

        foreach ($items as $item) {
            \App\ViewField::create($item);
        }
    }
}
