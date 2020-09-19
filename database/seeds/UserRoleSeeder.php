<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    const ADMIN_GROUP = 'admin';
    const ADMIN_PERMISSION = 'admin';

    const EXECUTOR_GROUP = 'executor';
    const EXECUTOR_PERMISSION = 'executor';

    const CUSTOMER_GROUP = 'customer';
    const CUSTOMER_PERMISSION = 'customer';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Groups

        \App\Models\Group::firstOrCreate([
            'name' => self::ADMIN_GROUP,
            'slug' => self::ADMIN_GROUP,
        ]);

        \App\Models\Group::firstOrCreate([
            'name' => self::EXECUTOR_GROUP,
            'slug' => self::EXECUTOR_GROUP,
        ]);

        \App\Models\Group::firstOrCreate([
            'name' => self::CUSTOMER_GROUP,
            'slug' => self::CUSTOMER_GROUP,
        ]);

        // Permissions

        \App\Models\Permission::firstOrCreate([
            'name' => self::ADMIN_PERMISSION,
            'slug' => self::ADMIN_PERMISSION,
        ]);

        \App\Models\Permission::firstOrCreate([
            'name' => self::EXECUTOR_PERMISSION,
            'slug' => self::EXECUTOR_PERMISSION,
        ]);

        \App\Models\Permission::firstOrCreate([
            'name' => self::CUSTOMER_PERMISSION,
            'slug' => self::CUSTOMER_PERMISSION,
        ]);
    }
}
