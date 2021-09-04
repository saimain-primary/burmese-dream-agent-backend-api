<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('agent_id')->uniqid();
            $table->string('email')->unique();
            $table->string('phone')->uniqid();
            $table->string('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->string('refer_code')->uniqid();
            $table->string('invited_by')->nullable();
            $table->string('facebook')->nullable();
            $table->text('qty_purchased')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
