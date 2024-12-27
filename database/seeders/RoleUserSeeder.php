<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;
class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i < 41; $i++) { 

            $permission = Permission::find($i);
            if ($permission) {
                DB::table('role_permissions')->insert([
                    'role_id' => 1,
                    'permission_id' => $i
                ]);
            }
        }
    }
}
