@extends('masterLayout.master')
@push('content')
    <!-- Dynamic Breadcrumb -->
    <div class="row">
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="{{ url('book/dashboard') }}">Dashboard</a>
                </li>

                <li class="breadcrumb-item active text-primary">Authors</li>
            </ol>
        </nav>
    </div>
    <!--/ Dynamic Breadcrumb -->


    <!-- Table -->
    <div class="row">

        <div class="card mb-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
            <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                <h5 class="card-header text-primary">
                    <li class="fa fa-align-justify"></li> Authors
                </h5>
                <a href="{{ route('author.create') }}" class="btn btn-primary">+ New Author</a>
            </div>
            <div class="menu-divider mb-4"></div>
            <div class="table-responsive text-nowrap card-body">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>S. No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($authors as $key => $author)
                            <tr>
                                <td>{{ ++$key }}</td> <!-- Serial Number -->
                                <td>{{ $author->name }}</td>
                                @php
                                    $id = Crypt::encrypt($author->id);
                                @endphp
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('edit-author/' . $id) }}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Edit
                                            </a>
                                            <button type="button" class="dropdown-item deletebtn"
                                                onclick="deleteAuthor('{{ $id }}')">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/ui-modals.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteAuthor(author_id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonColor: "#347842",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete-author/' + author_id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "The book has been deleted.",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "There was an issue deleting the book.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
