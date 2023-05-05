<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Direccion;
use App\Models\Persona;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'Demo',
            'email' => 'demo@demo.com',
            'password' => bcrypt('12345678'),
            'status' => true
        ]);

        $persona = Persona::create([
            'cedula' => 17719631,
            'rif' => 177196319,
            'primer_nombre' => 'Jesus',
            'segundo_nombre' => 'Abraham',
            'primer_apellido' => 'Mata',
            'segundo_apellido' => 'Garcia',
            'fecha' => '1985/11/19',
            'telefono' => '04242314794',
            'celular' => '04122069357',
            'email' => $user->email,
            'lugarnac' => 'Caracas',
            'nacionalidad' => 'Venezuela',
            'sexo' => 'Hombre',
            'status' => true,
            'user_id' => $user->id,
            'user_create' => $user->id,
            'parentesco_id' => 1,
            'personas_id' => 1,

        ]);

        Direccion::create([
            'personas_id' => $persona->id,
            'estados_id' => 14,
            'municipios_id' => 233,
            'ciudades_id' => 292,
            'parroquias_id' => 631,
            'urbanizacion' => 'Mopia',
            'zonas_id' => 1,
            'name_zona' => 'Sector',
            'areas_id' => 1,
            'name_area' => 'Vereda',
            'hogares_id' => 1,
            'name_hogar' => 'Casa',
            'status' => true,
        ]);


        $role = Role::where('name', 'Admin')->first();
        $user = User::where(['email' => 'demo@demo.com'])->first();
        $user->assignRole($role);
    }
}
