<?php

namespace App\Http\Middleware;

use App\Models\Book;
use Closure;
use Illuminate\Http\Request;

class BookOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $book = Book::findOrFail($request->route('id'));

        if ($book->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403, 'Access denied');
        }

        $request->merge(['book' => $book]);

        return $next($request);
    }
}
