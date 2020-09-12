<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttemptsToSolvedProblems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solved_problems', function (Blueprint $table) {
            $table->integer('attempts')->after('test_cases_met');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solved_problems', function (Blueprint $table) {
            $table->dropColumn('attempts');
        });
    }
}
