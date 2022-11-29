@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Просмотор книги</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('books.update', ['id' => $book->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Название книги</label>
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="name" name="title"
                                    value="{{ $book->title }}"
                                    {{ auth()->user() && auth()->user() && auth()->user()->hasBookAccess($book) ? '' : 'readonly' }}
                                >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Описание</label>
                                <textarea
                                    {{ auth()->user() && auth()->user()->hasBookAccess($book) ? '' : 'readonly' }}
                                    class="form-control @error('description') is-invalid @enderror"
                                    id="description"
                                    name="description">{{ $book->description }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @auth()
                                @if (auth()->user()->hasBookAccess($book))
                                    <a href="{{ route('books.delete', ['id' => $book->id]) }}" onclick="return confirm('Are you sure?')"  type="button" class="btn btn-danger" id="deleteBook">Удалить</a>
                                    <button class="btn btn-success">Сохранить</button>
                                @endif
                            @endauth
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
