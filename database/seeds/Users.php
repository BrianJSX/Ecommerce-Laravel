<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'super_admin']);
        $user = User::where('name', 'Onion')->first();
        $user->assignRole('super_admin');
        echo "ok";

    }
}
