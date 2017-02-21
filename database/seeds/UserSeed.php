<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$YtKVLS1uh95WrdBbqHaQoukWVwKLG7dfoow.EmEPt.9VF9FYe.RXq', 'role_id' => 1, 'remember_token' => '',],
            ['id' => 2, 'name' => 'Tramp', 'email' => 'tramp@gmail.com', 'password' => '$2y$10$ctBlFECYRpzVkLtj8h0wt.uLEoM9lWzr4x1m4bBe29z7vDSPvEPXu', 'role_id' => 3, 'remember_token' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
