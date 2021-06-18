<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('delivery_area');
            $table->string('complete_address');
            $table->string('contact_no');
            $table->string('delivery_instructions')->nullable();
            $table->string('nickname');
            $table->string('icon_name');
            $table->string('arrival_time')->nullable();
            $table->tinyInteger('is_selected')->default(0);
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
        Schema::dropIfExists('delivery_addresses');
    }
}
