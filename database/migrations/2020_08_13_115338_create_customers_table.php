<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username', 191)->unique()->nullable();
            $table->string('email', 191)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile_no', 10)->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('promo_code')->nullable();
            $table->integer('otp')->nullable();
            $table->string('display_name');
            $table->string('reward_point')->default(0);
            $table->tinyInteger('is_third_party')->default(0);
            $table->tinyInteger('facebook')->default(0);
            $table->tinyInteger('instagram')->default(0);
            $table->tinyInteger('twitter')->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
