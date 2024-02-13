<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->string('address');
            $table->string('address_2')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('country_id');
            $table->integer('pincode');
            $table->string('type');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('size_area');
            $table->string('status');
            $table->string('furnishing_status');
            $table->string('developer')->nullable();
            $table->string('project_name')->nullable();
            $table->string('floor_number')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('ownership_type')->nullable();
            $table->string('facing')->nullable();
            $table->string('contact_details')->nullable();
            $table->text('amenities')->nullable();
            $table->text('additional_details')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
