<?php

/**
* Agregamos un usuario nuevo a la base de datos.
*/
class UserTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'nombres'  => 'admin',
            'apellidos'  => 'admin',
            'cedula'  => '45',
            'contrato'  => '45',
            'celular'  => '45',
            'departamento'  => 'admin',
            'municipio'  => 'admin',


            'username'  => 'admin',

            'email'     => 'admin@admin.com',
            'name'=> 'Administrator',
            'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada




        ));
    }
}