<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ramsey\Uuid\Uuid;

class AddUuidToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('uuid')->after('id')->unique();
        });

        // Asignamos un UUID a cada registro existente
        foreach (\App\Models\User::all() as $user) {
            $user->uuid = Uuid::uuid4()->toString();
            $user->save();
        }
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('uuid');
        });
    }
}
