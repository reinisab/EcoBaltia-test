<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;

use App\Models\Book;

class BookController extends Controller
{


	private function filter_book_data($books){

		// Group the books by their IDs
		$groupedBooks = $books->groupBy('id');

		// Map over the grouped books to transform authors into an array
		$books = $groupedBooks->map(function ($bookGroup) {
			$authors = $bookGroup->pluck('author_name')->unique()->toArray();
			return [
				'id' => $bookGroup->first()->id,
				'name' => $bookGroup->first()->name,
				'publisher_name' => $bookGroup->first()->publisher_name,
				'authors' => $authors,
				'purchase_count' => $bookGroup->first()->purchase_count,
			];
		})->values(); // Reset keys to consecutive integers

		return $books;

	}

	public function show_table()
	{
		$currentMonth = Carbon::now()->month;
		$currentYear = Carbon::now()->year;

		$books = DB::table('books')
			->join('publishers', 'books.publisher_id', '=', 'publishers.id')
			->leftJoin('book_author', 'books.id', '=', 'book_author.book_id')
			->leftJoin('authors', 'book_author.author_id', '=', 'authors.id')
			->whereYear('books.publish_date', $currentYear)
			->whereMonth('books.publish_date', $currentMonth)
			->select('books.*', 'publishers.name as publisher_name', 'authors.name as author_name')
			->get();

		$books = $this->filter_book_data($books);

		$books = $books->sortByDesc('purchase_count')->values();

		return $books;
	}

	public function search(Request $request)
	{

		// Get the search query from the request
		$query = $request->input('query');

		// Fetch books that match the search query in either name or author_name columns
		$books = DB::table('books')
			->join('publishers', 'books.publisher_id', '=', 'publishers.id')
			->join('book_author', 'books.id', '=', 'book_author.book_id')
			->join('authors', 'book_author.author_id', '=', 'authors.id')
			->where('books.name', 'like', "%$query%")
			->orWhere('authors.name', 'like', "%$query%")
			->select('books.*', 'publishers.name as publisher_name', 'authors.name as author_name')
			->get();

		$books = $this->filter_book_data($books);

		$books = $books->sortByDesc('purchase_count')->values();

		return $books;
	}


	public function purchase($id)
	{
		$book = Book::findOrFail($id);
		$book->increment('purchase_count');
		return response()->json(['message' => 'Book purchased successfully'], 200);
	}


	public function top10()
	{
		$topBooks = Book::orderBy('purchase_count', 'desc')->take(10)->get();

		$xml = '<?xml version="1.0" encoding="UTF-8" ?>';
		$xml .= '<top10>';

		foreach ($topBooks as $book) {
			$xml .= '<book>';
			$xml .= '<name>' . $book->name . '</name>';
			$xml .= '<popularity>' . $book->purchase_count . '</popularity>';
			// Add other fields as needed
			$xml .= '</book>';
		}

		$xml .= '</top10>';

		return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
	}


}
