<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToInquiriesTable extends Migration
{
    public function up()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->string('contact_number')->nullable()->after('name');
            $table->text('address')->nullable()->after('email');
            $table->string('subject')->nullable()->after('address');
            $table->text('description')->nullable()->after('subject');
            $table->string('preferred_contact_method')->nullable()->after('description');
            $table->string('hear_about_us')->nullable()->after('preferred_contact_method');
            $table->string('urgency_level')->nullable()->after('hear_about_us');
            $table->text('comments')->nullable()->after('urgency_level');
            $table->date('submit_date')->nullable()->after('comments');
            $table->string('status')->nullable()->after('submit_date');
        });
    }

    public function down()
    {
        Schema::table('inquiries', function (Blueprint $table) {
            $table->dropColumn('contact_number');
            $table->dropColumn('address');
            $table->dropColumn('subject');
            $table->dropColumn('description');
            $table->dropColumn('preferred_contact_method');
            $table->dropColumn('hear_about_us');
            $table->dropColumn('urgency_level');
            $table->dropColumn('comments');
            $table->dropColumn('submit_date');
            $table->dropColumn('status');
        });
    }
}
