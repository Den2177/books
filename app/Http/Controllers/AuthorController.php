<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'middlename' => 'required|string',
        ]);

        Author::create($data);

        return redirect()->route('admin');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('admin');
    }
}
