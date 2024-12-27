<?php

namespace Database\Seeders;

use App\Models\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    private const PERMISSIONS = [
        // User Management
        // [
        //     'group' => 'User Management',
        //     'permissions' => [
        //         ['name' => 'View Users List', 'code' => 'USER_MANAGEMENT_READ'],
        //         ['name' => 'View User Details', 'code' => 'USER_MANAGEMENT_VIEW'],
        //         ['name' => 'Create User', 'code' => 'USER_MANAGEMENT_CREATE'],
        //         ['name' => 'Update User', 'code' => 'USER_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete User', 'code' => 'USER_MANAGEMENT_DELETE'],
        //         ['name' => 'Restore User', 'code' => 'USER_MANAGEMENT_RESTORE'],
        //         ['name' => 'Force Delete User', 'code' => 'USER_MANAGEMENT_FORCE_DELETE'],
        //     ]
        // ],

        // Role Management
        // [
        //     'group' => 'Role Management',
        //     'permissions' => [
        //         ['name' => 'View Roles List', 'code' => 'ROLE_MANAGEMENT_READ'],
        //         ['name' => 'View Role Details', 'code' => 'ROLE_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Role', 'code' => 'ROLE_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Role', 'code' => 'ROLE_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Role', 'code' => 'ROLE_MANAGEMENT_DELETE'],
        //     ]
        // ],

        // // Permission Management
        // [
        //     'group' => 'Permission Management',
        //     'permissions' => [
        //         ['name' => 'View Permissions List', 'code' => 'PERMISSION_MANAGEMENT_READ'],
        //         ['name' => 'View Permission Details', 'code' => 'PERMISSION_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Permission', 'code' => 'PERMISSION_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Permission', 'code' => 'PERMISSION_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Permission', 'code' => 'PERMISSION_MANAGEMENT_DELETE'],
        //     ]
        // ],

        // // Stakes Management
        // [
        //     'group' => 'Stakes Management',
        //     'permissions' => [
        //         ['name' => 'View Stakes List', 'code' => 'STAKES_MANAGEMENT_READ'],
        //         ['name' => 'View Stake Details', 'code' => 'STAKES_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Stake', 'code' => 'STAKES_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Stake', 'code' => 'STAKES_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Stake', 'code' => 'STAKES_MANAGEMENT_DELETE'],
        //         ['name' => 'Export Stakes', 'code' => 'STAKES_MANAGEMENT_EXPORT'],
        //     ]
        // ],

        // // Game Management
        // [
        //     'group' => 'Game Management',
        //     'permissions' => [
        //         ['name' => 'View Games List', 'code' => 'GAME_MANAGEMENT_READ'],
        //         ['name' => 'View Game Details', 'code' => 'GAME_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Game', 'code' => 'GAME_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Game', 'code' => 'GAME_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Game', 'code' => 'GAME_MANAGEMENT_DELETE'],
        //         ['name' => 'Manage Game Settings', 'code' => 'GAME_MANAGEMENT_SETTINGS'],
        //     ]
        // ],

        // // Reports
        // [
        //     'group' => 'Reports',
        //     'permissions' => [
        //         ['name' => 'View Reports', 'code' => 'REPORTS_READ'],
        //         ['name' => 'Generate Reports', 'code' => 'REPORTS_GENERATE'],
        //         ['name' => 'Export Reports', 'code' => 'REPORTS_EXPORT'],
        //     ]
        // ],

        // // Settings
        // [
        //     'group' => 'Settings',
        //     'permissions' => [
        //         ['name' => 'View Settings', 'code' => 'SETTINGS_READ'],
        //         ['name' => 'Update Settings', 'code' => 'SETTINGS_UPDATE'],
        //     ]
        // ],

        // Stake Claim Management
        // [
        //     'group' => 'Stake Claim Management',
        //     'permissions' => [
        //         ['name' => 'View Stake Claims List', 'code' => 'STAKES_CLAIM_MANAGEMENT_READ'],
        //         ['name' => 'View Stake Claim Details', 'code' => 'STAKES_CLAIM_MANAGEMENT_VIEW'],
        //         ['name' => 'Export Stake Claims', 'code' => 'STAKES_CLAIM_MANAGEMENT_EXPORT'],
        //     ]
        // ],

        // Draw Management
        // [
        //     'group' => 'Draw Management',
        //     'permissions' => [
        //         ['name' => 'View Draws List', 'code' => 'DRAW_MANAGEMENT_READ'],
        //         ['name' => 'View Draw Details', 'code' => 'DRAW_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Draw', 'code' => 'DRAW_MANAGEMENT_CREATE'],
        //         ['name' => 'Delete Draw', 'code' => 'DRAW_MANAGEMENT_DELETE'],
        //     ]
        // ],

        // Player Management
        // [
        //     'group' => 'Player Management',
        //     'permissions' => [
        //         ['name' => 'View Players List', 'code' => 'PLAYER_MANAGEMENT_READ'],
        //         ['name' => 'View Player Details', 'code' => 'PLAYER_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Player', 'code' => 'PLAYER_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Player', 'code' => 'PLAYER_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Player', 'code' => 'PLAYER_MANAGEMENT_DELETE'],
        //     ]
        // ],
        // Reward Management
        // [
        //     'group' => 'Reward Management',
        //     'permissions' => [
        //         ['name' => 'View Rewards List', 'code' => 'REWARD_MANAGEMENT_READ'],
        //         ['name' => 'View Reward Details', 'code' => 'REWARD_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Reward', 'code' => 'REWARD_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Reward', 'code' => 'REWARD_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Reward', 'code' => 'REWARD_MANAGEMENT_DELETE'],
        //     ]
        // ],

        // Payment Management
        // [
        //     'group' => 'Payment Management',
        //     'permissions' => [
        //         ['name' => 'View Payments List', 'code' => 'PAYMENT_MANAGEMENT_READ'],
        //         ['name' => 'View Payment Details', 'code' => 'PAYMENT_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Payment', 'code' => 'PAYMENT_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Payment', 'code' => 'PAYMENT_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Payment', 'code' => 'PAYMENT_MANAGEMENT_DELETE'],
        //     ]
        // ],

        // Transaction Management
        // [
        //     'group' => 'Transaction Management',
        //     'permissions' => [
        //         ['name' => 'View Transactions List', 'code' => 'TRANSACTION_MANAGEMENT_READ'],
        //         ['name' => 'View Transaction Details', 'code' => 'TRANSACTION_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Transaction', 'code' => 'TRANSACTION_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Transaction', 'code' => 'TRANSACTION_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Transaction', 'code' => 'TRANSACTION_MANAGEMENT_DELETE'],
        //     ]
        // ],

        // Wallet Management
        // [
        //     'group' => 'Wallet Management',
        //     'permissions' => [
        //         ['name' => 'View Wallets List', 'code' => 'WALLET_MANAGEMENT_READ'],
        //         ['name' => 'View Wallet Details', 'code' => 'WALLET_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Wallet', 'code' => 'WALLET_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Wallet', 'code' => 'WALLET_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Wallet', 'code' => 'WALLET_MANAGEMENT_DELETE'],
        //     ]
        // ],

        // Role Management
        // [
        //     'group' => 'Role Management',
        //     'permissions' => [
        //         ['name' => 'View Roles List', 'code' => 'ROLE_MANAGEMENT_READ'],
        //         ['name' => 'View Role Details', 'code' => 'ROLE_MANAGEMENT_VIEW'],
        //         ['name' => 'Create Role', 'code' => 'ROLE_MANAGEMENT_CREATE'],
        //         ['name' => 'Update Role', 'code' => 'ROLE_MANAGEMENT_UPDATE'],
        //         ['name' => 'Delete Role', 'code' => 'ROLE_MANAGEMENT_DELETE'],
        //     ]
        // ],

        // Bet Type Management
        [
            'group' => 'Bet Type Management',
            'permissions' => [
                ['name' => 'View Bet Types List', 'code' => 'BET_TYPE_MANAGEMENT_READ'],
                ['name' => 'View Bet Type Details', 'code' => 'BET_TYPE_MANAGEMENT_VIEW'],
                ['name' => 'Create Bet Type', 'code' => 'BET_TYPE_MANAGEMENT_CREATE'],
                ['name' => 'Update Bet Type', 'code' => 'BET_TYPE_MANAGEMENT_UPDATE'],
                ['name' => 'Delete Bet Type', 'code' => 'BET_TYPE_MANAGEMENT_DELETE'],
                ['name' => 'Restore Bet Type', 'code' => 'BET_TYPE_MANAGEMENT_RESTORE'],
                ['name' => 'Force Delete Bet Type', 'code' => 'BET_TYPE_MANAGEMENT_FORCE_DELETE'],
            ]
        ],
    ];

    public function run(): void
    {
        // foreach (self::PERMISSIONS as $groupData) {
        //     foreach ($groupData['permissions'] as $permission) {
        //         $permission = Permission::create([
        //             'name' => $permission['name'],
        //             'code' => $permission['code'],
        //             'description' => "Allows user to {$permission['name']}",
        //         ]);

        //         DB::table('role_permissions')->insert([
        //             'role_id' => 1,
        //             'permission_id' => $permission->id
        //         ]);
        //     }
        // }
    }
}
