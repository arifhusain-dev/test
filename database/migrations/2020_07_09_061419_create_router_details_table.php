<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('router_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sap_id', 18)->unique();
            $table->string('host_name', 14);
            $table->string('ip_address', 20);
            $table->string('loopback', 100);
            $table->string('mac_address', 17)->unique();
            $table->string('is_deleted', 1)->default(0);
            $table->dateTime('created');
            $table->dateTime('modified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('router_details');
    }
}
