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
        Schema::create('details', function (Blueprint $table) {
            $table->string('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_en');
            $table->string('last_name_en');
            $table->string('email');
            $table->string('idcard');
            $table->string('goto');
            $table->date('birthdate');
            $table->integer('age');
            $table->string('address');
            $table->string('phone');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*
        Schema::table('details', function (Blueprint $table) {
            //Drop 
            $table->dropForeign(['email']);
        });

        Schema::dropIfExists('details');
    }*/
        Schema::dropIfExists('details');
    }
};
