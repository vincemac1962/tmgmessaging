<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id');
            $table->foreignId('company_id');
            $table->string('description');
            $table->string('link');
            $table->time('time_on');
            $table->time('time_off');
            $table->date('date_on');
            $table->date('date_off');
            $table->boolean('global');
            $table->string('specific_sites')->nullable();
            $table->longText('notes');
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
        //
    }
}
