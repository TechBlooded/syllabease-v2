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
        Schema::create('cot_f_comments', function (Blueprint $table) {
            $table->id('cot_f_comment_id');
            $table->unsignedBigInteger('syll_co_out_id');
            $table->text('cot_f_comment_text');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('cot_f_comment_created_at');
            $table->timestamp('cot_f_comment_resolved_at')->nullable();;
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('syll_co_out_id')->references('syll_co_out_id')->on('syllabus_course_outlines_finals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cot_f_comments');
    }
};
