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
                                <input type="text" class="form-control" id="name" name="title" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Описание</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <button class="btn btn-success">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
