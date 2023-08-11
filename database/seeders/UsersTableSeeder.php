<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admonbolichequetgo@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Bienvenida2023'),
            'avatar' => 'federacion2.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('administracion')->insert([
            'estado' => 'activo',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}