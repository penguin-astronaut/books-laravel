<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::where('role', '=', 'author')->paginate();

        return view('authors', ['authors' => $authors]);
    }

    public function show($id)
    {
        $author = User::where('role', '=', 'author')
            ->where('id', '=', $id)
            ->firstOrFail();
        $books = $author->books()->paginate();

        return view('home', ['author' => $author, 'books' => $books]);
    }
}
