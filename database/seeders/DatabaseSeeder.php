<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Kantor;
use App\Models\Kpi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Role::firstOrCreate(['name' => 'Admin']);

        Kantor::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Kantor Toha',
                'address' => 'Jl. M. Toha No. 266, Bandung 40243',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Kantor::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Kantor Karapitan',
                'address' => 'Jl. Karapitan No.16 B, Bandung 40261',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $user = User::create([
            'uuid' => Str::uuid(),
            'department_id' => '1',
            'kantor_id' => '1',
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123*'),
        ]);

        $user->syncRoles('admin');

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        User::create([
            'uuid' => Str::uuid(),
            'department_id' => '2',
            'kantor_id' => '1',
            'username' => 'yandi',
            'name' => 'YandiYandhi',
            'email' => 'yandi@example.com',
            'password' => Hash::make('admin123*'),
        ]);

        Kpi::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Action Plan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Daily Report',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Category::insert([
            [
                'uuid' => Str::uuid(),
                'task_name' => 'Hardware',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'task_name' => 'Jaringan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'task_name' => 'Software',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Status::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Queue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'On Progress',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Cancel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Done',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Success',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Department::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Operational',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Finance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $permissions = [
            'dashboardit.edit',
            'dashboardhr.edit',

            'kantor.view',
            'kantor.edit',
            'kantor.update',
            'kantor.delete',

            'departemen.view',
            'departemen.edit',
            'departemen.update',
            'departemen.delete',

            'kategori.view',
            'kategori.edit',
            'kategori.update',
            'kategori.delete',

            'status.view',
            'status.edit',
            'status.update',
            'status.delete',

            'kpi.view',
            'kpi.edit',
            'kpi.update',
            'kpi.delete',

            'user.view',
            'user.edit',
            'user.update',
            'user.password',
            'user.role',

            'requesttiket.view',
            'requesttiket.add',
            'requesttiket.edit',
            'requesttiket.success',
            'requesttiket.cancel',

            'laporan.view',
            'laporan.export',

            'role.view',
            'role.edit',
            'role.permission',
            'role.delete',

            'permission.view',
            'permission.edit',
            'permission.update',
            'permission.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        // $admin->syncPermissions(Permission::all());
    }
}
