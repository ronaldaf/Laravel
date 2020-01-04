<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');
    	for ($i=0; $i<50 ; $i++) {
    // insert data ke table pegawai
    		DB::table('customer')->insert([
    			'nama' => $faker->name,
    			'alamat' => $faker->address,
    			'no_telp' => $faker->phoneNumber,
    			'catatan' => $faker->text
    		]);
    	}
    }
}
