<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id('p_id');
            $table->string('package_name');
            $table->unsignedBigInteger('package_type')->nullable();
            $table->foreign('package_type')->references('pc_id')->on('packagecategories')->onDelete('SET NULL');
            $table->string('package_location');
            $table->string('package_price');
            $table->string('package_feature');
            $table->string('package_details');
            $table->string('package_time_duration');
            $table->string('package_image')->nullable();
            $table->enum('status',['active','inactive'])->default('active');

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
        Schema::dropIfExists('packages');
    }
}
