<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropStreamsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['stream_id']);
        });

        Schema::dropIfExists('streams');
    }

    public function down()
    {
        Schema::create('streams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('stream_id')->references('id')->on('streams');
        });
    }
}

