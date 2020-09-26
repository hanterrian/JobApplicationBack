<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScribeUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user = User::create([
            'name' => 'Scribe',
            'email' => 'scribe@locale.dev',
            'password' => Hash::make('scribe@locale.dev'),
        ]);

        echo "New user id: {$user->id}\n";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = User::whereEmail('scribe@locale.dev')->first();

        $user->forceDelete();
    }
}
