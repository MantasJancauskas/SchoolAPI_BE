<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_aplications', function (Blueprint $table) {
            $table->id('id');
            $table->string('birth_day');
            $table->string('name');
            $table->integer('class');
            $table->integer('grade');
            $table->foreignId('school_id')->nullable()->references('id')->on('schools')
                    ->onDelete('set Null')
                    ->onUpdate('restrict');
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
        Schema::dropIfExists('children_aplications');
    }
};
