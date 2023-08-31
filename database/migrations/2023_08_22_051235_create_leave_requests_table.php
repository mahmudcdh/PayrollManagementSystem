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
        Schema::create('leave_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete();

            $table->unsignedBigInteger('leave_id');
            $table->foreign('leave_id')->references('id')->on('leave_categories')->restrictOnDelete();

            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('users')->restrictOnDelete();

            $table->date('fm_date');
            $table->date('to_date');
            $table->text('reason');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};
