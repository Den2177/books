<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        Genre::create($data);

        return redirect()->route('admin');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('admin');
    }
}
