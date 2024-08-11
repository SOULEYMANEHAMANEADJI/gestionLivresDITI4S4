@extends('base')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4> Details of Book
                            <a href="{{ route('books.index') }}" class="btn btn-secondary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="title">Title</label>
                                <div class="border">{{ $book->title }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="author">Author</label>
                                <div class="border">{{ $book->author }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
