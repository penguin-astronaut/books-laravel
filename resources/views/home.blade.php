@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @isset($author)
                <div class="card mb-3">
                    <div class="card-header"><h2>Автор</h2></div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item "><span class="fw-bold">Имя:</span> {{ $author->name }}</li>
                            <li class="list-group-item "><span class="fw-bold">Email:</span> {{ $author->email }}</li>
                            <li class="list-group-item "><span class="fw-bold">Количество книг:</span> {{ $books->total() }}</li>
                        </ul>
                    </div>
                </div>
            @endisset


            <div class="card">
                <div class="card-header"><h2>Книги</h2></div>

                <div class="card-body">
                    @foreach($books as $book)
                        <p class="fst-italic">"{{$book->title}}"</p>
                        <p class="mb-2">Автор:
                            <a href="{{ route('authors.show', ['id' => $book->author->id]) }}" class="link-info">{{$book->author->name}}</a>
                        </p>
                        <div class="d-flex">
                            <a href="{{ route('books.show', ['id' => $book->id]) }}" class="btn btn-info">Подробнее</a>
                        </div>

                        <hr>
                    @endforeach
                </div>

                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
