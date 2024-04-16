<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
			 DB::table('book_author')->insert([
				 'book_id' => 1, // ID of the book
				 'author_id' => 1, // ID of the author
			 ]);
			 DB::table('book_author')->insert([
				 'book_id' => 2, // ID of the book
				 'author_id' => 2, // ID of the author
			 ]);
			 DB::table('book_author')->insert([
				 'book_id' => 3, // ID of the book
				 'author_id' => 3, // ID of the author
			 ]);
			 DB::table('book_author')->insert([
				 'book_id' => 3, // ID of the book
				 'author_id' => 2, // ID of the author
			 ]);
			 DB::table('book_author')->insert([
				 'book_id' => 3, // ID of the book
				 'author_id' => 1, // ID of the author
			 ]);
			 DB::table('book_author')->insert([
				 'book_id' => 4, // ID of the book
				 'author_id' => 1, // ID of the author
			 ]);
			 DB::table('book_author')->insert([
				 'book_id' => 5, // ID of the book
				 'author_id' => 2, // ID of the author
			 ]);
			 DB::table('book_author')->insert([
				 'book_id' => 6, // ID of the book
				 'author_id' => 1, // ID of the author
			 ]);
			 DB::table('book_author')->insert([
				 'book_id' => 6, // ID of the book
				 'author_id' => 2, // ID of the author
			 ]);
    }
}
