<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Kpi;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'uuid' => Str::uuid(),
            'department_id' => '1',
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123*'),
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'department_id' => '2',
            'username' => 'guest',
            'name' => 'Guest User',
            'email' => 'guest@example.com',
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
                'name' => 'Not Started',
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
    }
}
