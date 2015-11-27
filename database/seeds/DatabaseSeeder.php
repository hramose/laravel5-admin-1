<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(['username' => 'admin', 'password' => Hash::make('admin'), 'role_id' => 1]);

        DB::table('roles')->delete();
        Role::create(['id' => 1, 'name' => "admin", 'users' => '1,2,3,4,5', 'roles' => '1,2,4,5']);

    }

}