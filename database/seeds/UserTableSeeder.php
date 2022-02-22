<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrator = Role::where('name', 'administrator')->first();
        $role_manager  = Role::where('name', 'manager')->first();
        $role_individual  = Role::where('name', 'individual')->first();
        $role_entity  = Role::where('name', 'entity')->first();
        
        $administrator = new User();
        $administrator->name = 'Администратор';
        $administrator->email = 'administrator@example.com';
        $administrator->password = bcrypt('secret');
        $administrator->save();
        $administrator->roles()->attach($role_administrator);

        $individual = new User();
        $individual->name = 'Физическое лицо';
        $individual->email = 'individual@example.com';
        $individual->password = bcrypt('secret');
        $individual->save();
        $individual->roles()->attach($role_individual);

        $entity = new User();
        $entity->name = 'Юридическое лицо';
        $entity->email = 'entity@example.com';
        $entity->password = bcrypt('secret');
        $entity->save();
        $entity->roles()->attach($role_entity);
    }
}
