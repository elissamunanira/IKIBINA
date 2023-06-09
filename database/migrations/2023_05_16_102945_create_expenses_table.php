<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('budget_line_id');
            $table->string('expense_name');
            $table->string('expense_description');
            $table->date('expense_date');
            $table->decimal('expense_amount', 15, 2);
            $table->timestamps();

            $table->foreign('budget_line_id')->references('id')->on('budget_lines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
