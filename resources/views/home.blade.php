@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @isset($author)
                <div class="card mb-3">
                    <div class="card-header"><h2>Автор</h2></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('authors.update', ['id' => $author->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    value="{{ $author->name }}"
                                    @auth() {{ auth()->user()->isAdmin() ? '' : 'readonly' }} @endauth
                                >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    placeholder="name@example.com"
                                    value="{{ $author->email }}"
                                    value="{{ $author->name }}"
                                    @auth() {{ auth()->user()->isAdmin() ? '' : 'readonly' }} @endauth
                                >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item "><span class="fw-bold">Количество книг:</span> {{ $books->total() }}</li>
                            </ul>
                            @auth()
                                @if (auth()->user()->isAdmin())
                                    <div class="mt-3">
                                        <a href="{{ route('authors.delete', ['id' => $author->id]) }}" onclick="return confirm('Are you sure?')"  type="button" class="btn btn-danger">Удалить</a>
                                        <button class="btn btn-success">Сохранить</button>
                                    </div>

                                @endif
                            @endauth
                        </form>
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
