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
            ['name' =>'School of Business' ],
            ['name' =>'School of Finance and Applied Economics' ],
            ['name' =>'School of Humanities and Social Sciences' ],
            ['name' =>'School of Law' ],
            ['name' =>'School of Management and Commerce' ],
            ['name' =>'School of Mathematical Sciences' ],
            ['name' =>'School of Computing and Informatics' ],
            ['name' =>'School of Graduate Studies' ]
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