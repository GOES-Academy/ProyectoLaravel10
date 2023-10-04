<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'nombre' => 'Gerardo',
            'apellido' => 'Amaya',
            'fecha_nacimiento' => '2000-12-31',
            'genero' => 'M',
            'username' => 'gerardoamaya',
            'email' => 'gerardoamayasv2000@gmail.com',
            'dui'   => '06081265-3',
            'direccion' => 'San Salvador',
            'celular' => '7508-3870',
            'role' => 'admin',
            'activo' => 1,
            'password' => bcrypt('12345678'), // password
            'token_verified_email' => Str::random(10),
        ]);

        User::create([
            'nombre' => 'Angel',
            'apellido' => ' Bran',
            'fecha_nacimiento' => '2000-12-31',
            'genero' => 'M',
            'username' => 'angelbran',
            'email' => 'angelantoniosv2000@gmail.com',
            'dui'   => '01182263-2',
            'direccion' => 'San Salvador',
            'celular' => '7777-3333',
            'role' => 'admin',
            'activo' => 1,
            'password' => bcrypt('12345678'), // password
            'token_verified_email' => Str::random(10),
        ]);

        User::factory()->count(10)->create();
    }
}
