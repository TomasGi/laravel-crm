<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Commands\CreatePermission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'manager',
            'worker'
        ];

        // no need to specify other
        $adminOnlyPermisions = [
            'create user manager'
        ];

        $managerPermissions = [
            'create user worker',
            'create task',
        ];

        $workerPermissions = [
            'create task',
        ];

        foreach ($roles as $role) {
            $roleId = $this->createRole($role);
            $userId = $this->createUser($role);
            $this->userHasRole($userId, $roleId);
        }

        foreach ($adminOnlyPermisions as $permission) {
            $this->createPermission($permission); 
        }

        $managerRoleId = Role::findByName('manager')->id;
        foreach ($managerPermissions as $permission) {
           $permisionId = $this->createPermission($permission);
           $this->roleHasPermission($permisionId, $managerRoleId);
        }

        $workerRoleId = Role::findByName('worker')->id;
        foreach ($workerPermissions as $permission) {
            $permisionId = $this->createPermission($permission);
            $this->roleHasPermission($permisionId, $workerRoleId);
         }

    }

    private function createRole($roleName) {
        return DB::table('roles')->insertGetId(
            [
                'name' => $roleName,
                'guard_name' => 'web'
            ]
        );
    }

    private function createUser($userName) {
        return DB::table('users')->insertGetId(
            [
                'name' => $userName,
                'email' => $userName . '@e.com',
                'password' => bcrypt('12345678')
            ]
        );
    }

    private function userHasRole($userId, $roleId) {
        DB::table('model_has_roles')->insert(
            [
                'role_id' => $roleId,
                'model_type' => 'App\User',
                'model_id' => $userId
            ]
        );
    }

    private function createPermission($permission) {
        try {
            return DB::table('permissions')->insertGetId(
                [
                    'name' => $permission,
                    'guard_name' => 'web'
                ]
            );
        } catch (\Exception $e) {
            return DB::table('permissions')->where('name', $permission)->value('id');
        }
    }

    private function roleHasPermission($permisionId, $roleId) {
        DB::table('role_has_permissions')->insert(
            [
                'permission_id' => $permisionId,
                'role_id' => $roleId
            ]
        );
    }
}
