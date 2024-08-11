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
                    <h4>Add Book with IMAGE
                        <a href="{{ route('books.index') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">

                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                       
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror">
                            </textarea>
                            @error('description')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Author</label>
                            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror">

                            @error('author')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nb of Pages</label>
                            <input type="text" name="nb_pages" min="15" max="500" class="form-control @error('nb_pages') is-invalid @enderror">

                            @error('nb_pages')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Book Profile Image</label>
                            <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror">
                            @error('cover_image')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Book</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection