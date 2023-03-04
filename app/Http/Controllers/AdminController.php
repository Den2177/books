<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $authors = Author::all();
        $books = Book::all();

        return view('admin.index', compact('genres','authors', 'books'));
    }
}
