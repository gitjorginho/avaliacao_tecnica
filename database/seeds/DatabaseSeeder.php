<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
     \App\Usuario::create([
        'usuario'=>'admin',
        'senha'=> bcrypt('admin')
        ]);
    }
}
