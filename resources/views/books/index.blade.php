@extends('base')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4> Laravel 11 IMAGE CRUD
                            <a href="{{ route('books.create') }}" class="btn btn-primary float-end">Add Book</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive"">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Cover Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->author }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/books/' . $item->cover_image) }}"
                                                    width="50px" height="50px" alt="Image" style="border-radius: 50%">
                                            </td>
                                            <td style="display: flex">
                                                <a href="{{ route('books.show', $item->id) }}" class="btn btn-outline-info btn-sm mx-1">View</a>
                                                <!-- {{ url('edit-book/' . $item->id) }} -->
                                                <a href="{{ route('books.edit', $item->id) }}"
                                                    class="btn btn-outline-warning btn-sm mx-1">Edit</a>
                                                {{-- <a href="{{ url('delete-student/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                               <form action="{{ route('books.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- <button type="submit" class="btn btn-danger btn-sm">Delete</button> --}}
                                                    <button type="button" class="btn btn-outline-danger btn-sm mx-1" data-toggle="modal"
                                                        data-target="#deleteModal"
                                                        onclick="setDeleteFormAction('{{ url('delete-student/' . $item->id) }}')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmer la Suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sûr de vouloir supprimer cet étudiant ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Annuler</button>
                                        <form id="deleteForm" action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setDeleteFormAction(action) {
            document.getElementById('deleteForm').action = action;
        }
    </script>
@endsection
