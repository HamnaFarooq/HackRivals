<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('problem_type');
            $table->integer('points');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('level');
            $table->integer('sub_level');
            $table->integer('solved_by')->nullable();
            $table->integer('total_attempts')->nullable();
            $table->text('statement');
            $table->text('description');
            $table->string('constraints');
            $table->string('input_format');
            $table->string('output_format');
            $table->string('sample_input');
            $table->string('sample_output');
            $table->string('hint')->nullable();
            $table->string('explaination')->nullable();

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
        Schema::dropIfExists('problems');
    }
}
