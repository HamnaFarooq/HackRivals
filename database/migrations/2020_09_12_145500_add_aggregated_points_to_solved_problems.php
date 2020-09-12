<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAggregatedPointsToSolvedProblems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solved_problems', function (Blueprint $table) {
            $table->integer('aggregated_points')->after('points_earned');
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
            $table->dropColumn('aggregated_points');
        });
    }
}
