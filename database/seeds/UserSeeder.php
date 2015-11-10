<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(
            [
                'name'      => 'Admin',
                'email'     => 'admin@wanmarcos.com',
                'password'  => bcrypt('G7@0Cj$iwCJtIM8/sM')
            ]
        );
    }
}
