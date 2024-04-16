<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		 DB::table('books')->insert([
			 'name' => 'JUST FOR THE SUMMER',
			 'publisher_id' => 1,
			 'publish_date' => '2024-04-04',
		 ]);
		 DB::table('books')->insert([
			 'name' => 'THE WOMEN',
			 'publisher_id' => 2,
			 'publish_date' => '2024-04-04',
		 ]);
		 DB::table('books')->insert([
			 'name' => 'TABLE FOR TWO',
			 'publisher_id' => 3,
			 'publish_date' => '2024-04-04',
		 ]);
		 DB::table('books')->insert([
			 'name' => 'FOURTH WING',
			 'publisher_id' => 3,
			 'publish_date' => '2024-04-04',
		 ]);
		 DB::table('books')->insert([
			 'name' => 'IRON FLAME',
			 'publisher_id' => 3,
			 'publish_date' => '2024-04-04',
		 ]);
		 DB::table('books')->insert([
			 'name' => 'THE ANXIOUS GENERATION',
			 'publisher_id' => 1,
			 'publish_date' => '2024-04-04',
		 ]);
		 DB::table('books')->insert([
			 'name' => 'AGE OF REVOLUTIONS',
			 'publisher_id' => 2,
			 'publish_date' => '2024-04-04',
		 ]);

    }
}
