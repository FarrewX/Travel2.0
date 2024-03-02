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
            $table->string('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('idcard');
            $table->date('birthdate');
            $table->integer('age');
            $table->string('address');
            $table->string('goto');
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
