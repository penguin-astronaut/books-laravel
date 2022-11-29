@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Создание книги</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('books.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Название книги</label>
                                <input
                                    type="text"
                                    class="form-control form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    name="title">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Описание</label>
                                <textarea  class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                ></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($authors)
                                <div class="mb-3">
                                    <label for="description" class="form-label">Автор</label>
                                    <select class="form-select @error('user_id') is-invalid @enderror" name="user_id" id="user_id">
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            @endif
                            <button class="btn btn-success">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
