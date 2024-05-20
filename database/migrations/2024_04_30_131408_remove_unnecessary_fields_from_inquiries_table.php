<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUnnecessaryFieldsFromInquiriesTable extends Migration
{
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('contact_number');
            $table->dropColumn('address');
            $table->dropColumn('preferred_contact_method');
            $table->dropColumn('hear_about_us');
            $table->dropColumn('urgency_level');
            $table->dropColumn('comments');
            $table->dropColumn('status');
        });
    }

    public function down()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->string('preferred_contact_method')->nullable();
            $table->string('hear_about_us')->nullable();
            $table->string('urgency_level')->nullable();
            $table->text('comments')->nullable();
            $table->string('status')->nullable();
        });
    }
}

