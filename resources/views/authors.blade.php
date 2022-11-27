@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>Авторы</h2></div>

                    <div class="card-body">
                        @foreach($authors as $author)
                            <p>
                                <a href="{{ route('authors.show', ['id' => $author->id]) }}" class="link-info">{{ $author->name }}</a>
                            </p>

                        @endforeach
                    </div>

                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
