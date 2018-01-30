<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        User::create([
            'name' => 'Amine',
            'email' => 'amine@app.com',
            'role' => 'admin',
            'password' => bcrypt('islam022'),
            'settings' => '{"pagination": 8}'
        ]);
        User::create([
            'name' => 'Mouad',
            'email' => 'mouad@app.comfr',
            'password' => bcrypt('islam022'),
            'settings' => '{"pagination": 8}',
        ]);
    }
}
