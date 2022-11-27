@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Книги</div>

                <div class="card-body">
                    @foreach($books as $book)
                        <p>{{$book->title}}</p>
                    @endforeach
                </div>

                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
