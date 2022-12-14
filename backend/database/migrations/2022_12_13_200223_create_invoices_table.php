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
        Schema::create('invoices', function (Blueprint $table) {
            $table->integer('id')->unsigned()->unique()->autoIncrement();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('employee_id');
            $table->timestamp('due_date')->nullable();
            $table->timestamp('submitted_date')->nullable();
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->nullable();
            $table->string('adjustment')->nullable();
            $table->string('total')->nullable();
            $table->json('product_info')->nullable();
            $table->string('file_link')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
