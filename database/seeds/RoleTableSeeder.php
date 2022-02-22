<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_administrator = new Role();
        $role_administrator->name = 'administrator';
        $role_administrator->description = 'Администратор сайта';
        $role_administrator->save();

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description = 'Менеджер сайта';
        $role_manager->save();

        $role_individual = new Role();
        $role_individual->name = 'individual';
        $role_individual->description = 'Физическое лицо';
        $role_individual->save();

        $role_entity = new Role();
        $role_entity->name = 'entity';
        $role_entity->description = 'Юридическое лицо';
        $role_entity->save();
    }
}
