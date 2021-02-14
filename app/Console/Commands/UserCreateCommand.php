<?php

namespace App\Console\Commands;

use App\Models\Group;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserCreateCommand
 * @package App\Console\Commands
 */
class UserCreateCommand extends Command
{
    protected $signature = 'user:create {user} {email} {password}';

    protected $description = 'Create admin user';

    public function handle()
    {
        $user = User::create([
            'name' => $this->argument('user'),
            'email' => $this->argument('email'),
            'password' => Hash::make($this->argument('password')),
        ]);

        if ($user) {
            $group = Group::where(['name' => 'admin'])->first();
            $permission = Permission::where(['name' => 'admin'])->first();

            $user->assignGroup($group);
            $user->assignPermissions($permission);

            $this->info('User create');
        } else {
            $this->error('User create error');
        }
    }
}
