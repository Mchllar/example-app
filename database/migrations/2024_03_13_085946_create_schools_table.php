<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        // Populate schools data
        $schoolsData = [
            [ 'School of Business' ],
            [ 'School of Finance and Applied Economics' ],
            [ 'School of Humanities and Social Sciences' ],
            [ 'School of Law' ],
            [ 'School of Management and Commerce' ],
            [ 'School of Mathematics, Actuarial Science, and Finance' ],
            [ 'School of Computing and Informatics' ],
            [ 'School of Graduate Studies' ]
        ];

        DB::table('schools')->insert($schoolsData);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
};