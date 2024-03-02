<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Details;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        Details::all()->each(function ($details) {
            database2::factory(10)->create(['primary' => $details->foreignkey]);
        });
        */

        DB::table('details')
        ->insert([
            'id' => '1111111111',
            'first_name' => 'เจษฎา',
            'last_name' => 'พรมโสภา',
            'first_name_en' => 'Jesada',
            'last_name_en' => 'Promsopa',
            'idcard' => '1234567890123',
            'birthdate' => fake()->date,
            'age' => fake()->numberBetween(20, 80),
            'address' => fake('th_TH')->address,
            'phone' => fake()->phoneNumber,
            'email' => 'a0987142276@gmail.com',
            'goto' => fake('th_TH')->address,
        ]);

        Details::factory(20)->create();
    }
}
