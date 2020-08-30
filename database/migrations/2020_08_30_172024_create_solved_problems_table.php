<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolvedProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solved_problems', function (Blueprint $table) {
            $table->id();

            $table->text('solution');
            $table->integer('test_cases_met');
            $table->integer('points_earned');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('problem_id')->constrained('problems');

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
        Schema::dropIfExists('solved_problems');
    }
}
