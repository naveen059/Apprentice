<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->after('amount');
            $table->string('upi_id')->nullable()->after('payment_method');
            $table->string('cash_receipt_number')->nullable()->after('upi_id');
            $table->string('bank_name')->nullable()->after('cash_receipt_number');
            $table->string('transaction_type')->nullable()->after('bank_name');
            $table->string('payment_status')->nullable()->after('course_id');
        });
    }

    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'upi_id', 'cash_receipt_number', 'bank_name', 'transaction_type', 'payment_status']);
        });
    }
}

