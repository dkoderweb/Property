<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_filters', function (Blueprint $table) {
            $table->id();
            $table->string('report_name')->nullable();
            $table->string('select_columns_2_text')->nullable();
            $table->string('select_columns_text')->nullable();
            $table->string('select_columns_name')->nullable();
            $table->string('select_columns_2_name')->nullable();
            $table->string('number_filters_name')->nullable();
            $table->string('number_filters')->nullable();
            $table->string('number_filters_2')->nullable();
            $table->string('number_filters_2_name')->nullable();
            $table->string('from_balance')->nullable();
            $table->string('from_balance_2')->nullable();
            $table->string('select_operator')->nullable();
            $table->string('select_operator_text')->nullable();
            $table->integer('user_id');
            $table->string('number_filters_3')->nullable();
            $table->string('number_filters_3_name')->nullable();
            $table->string('select_columns_3_text')->nullable();
            $table->string('select_columns_3_name')->nullable();
            $table->string('select_operator_3')->nullable();
            $table->string('select_operator_3_text')->nullable();
            $table->string('from_balance_3')->nullable();
            $table->string('number_filters_4')->nullable();
            $table->string('number_filters_4_name')->nullable();
            $table->string('select_columns_4_text')->nullable();
            $table->string('select_columns_4_name')->nullable();
            $table->string('select_operator_4')->nullable();
            $table->string('select_operator_4_text')->nullable();
            $table->string('from_balance_4')->nullable();
            $table->string('number_filters_5')->nullable();
            $table->string('number_filters_5_name')->nullable();
            $table->string('select_columns_5_text')->nullable();
            $table->string('select_columns_5_name')->nullable();
            $table->string('select_operator_5')->nullable();
            $table->string('select_operator_5_text')->nullable();
            $table->string('from_balance_5')->nullable();
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
        Schema::dropIfExists('report_filters');
    }
}
