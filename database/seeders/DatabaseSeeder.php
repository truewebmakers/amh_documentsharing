<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\Models\Role; 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->PermissionSeeder();
        $this->AdminSeeder();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
 
    }


    public function AdminSeeder(){
       $user = User::create([
            'name' => 'Admin User', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@123')
        ]);
        $role = Role::create(['name' => 'admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    
    
    }


    public function PermissionSeeder(){
        $permissions = [
           'user-management-access',  
           'user-profile-update',  
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
