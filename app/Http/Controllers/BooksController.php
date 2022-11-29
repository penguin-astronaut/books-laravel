<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.show', ['book' => $book]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'title' => 'required|string|max:150',
           'description' => 'required|string'
        ]);

        $validatedData['user_id'] = Auth::id();

        Book::create($validatedData);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required|string'
        ]);

        $book->update($validatedData);

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $request->get('book')->delete();

        return redirect()->route('authors.show', ['id' => auth()->id()]);
    }
}
