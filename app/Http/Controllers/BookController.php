<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'author_id'=> 'required',
            'image'=> 'required|image',
            'genres' => 'required|array',
        ]);

        $data['image'] = $this->saveImage($request->file('image'));
        $data['isVisibleInMainPage'] = isset($data['isVisibleInMainPage']);
        $genres = $data['genres'];
        $data = collect($data)->except('_token', 'genres')->toArray();
        $book = Book::create($data);
        $book->genres()->attach($genres);

        return redirect()->route('admin');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('admin');
    }

    public function index()
    {
        $authors = Author::all();
        $genres = Genre::all();

        $books = Book::filter()->paginate(8)->withQueryString();
        $links = ceil($books->total() / 8);
        return view('books.index', compact('books', 'authors', 'genres', 'links'));
    }
}
