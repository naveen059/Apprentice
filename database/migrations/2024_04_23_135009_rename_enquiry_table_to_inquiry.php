<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameEnquiryTableToInquiry extends Migration
{
    public function up()
    {
        Schema::rename('enquiries', 'inquiries');
    }

    public function down()
    {
        Schema::rename('inquiries', 'enquiries');
    }
}

