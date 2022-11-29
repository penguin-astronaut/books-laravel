<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = User::where('role', '=', 'author')->orderByDesc('id')->paginate();

        return view('authors.index', ['authors' => $authors]);
    }

    public function show($id)
    {
        $author = User::where('role', '=', 'author')
            ->where('id', '=', $id)
            ->firstOrFail();
        $books = $author->books()->orderByDesc('id')->paginate();

        return view('home', ['author' => $author, 'books' => $books]);
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('authors.index');
    }

    public function update(Request $request, $id)
    {
        $author = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|string|unique:users,email,$id"
        ]);

        $author->update($validatedData);

        return redirect()->back();
    }

    public function delete($id)
    {
        $author = User::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index');
    }
}
