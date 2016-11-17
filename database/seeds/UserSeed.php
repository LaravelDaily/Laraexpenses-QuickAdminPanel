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
            ['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('password'), 'role_id' => 1]
        ];

        foreach ($items as $item) {
            $model = new \App\User();

            foreach ($item as $key => $value) {
                $model->{$key} = $value;
            }

            $model->save();
        }
    }
}
