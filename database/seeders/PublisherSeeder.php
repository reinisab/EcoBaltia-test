<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		 DB::table('publishers')->insert([
			 'name' => 'Pearson',
		 ]);
		 DB::table('publishers')->insert([
			 'name' => 'Wiley',
		 ]);
		 DB::table('publishers')->insert([
			 'name' => 'Chronicle Books',
		 ]);
    }
}
