@extends('masterlayout.master')

@push('content')
    <!-- Draggable Cards -->
    <div class="row">
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href={{ route('home') }}>Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('setting') }}">Setting</a>
                </li>

                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
        <!-- Hoverable Table rows -->
        <div class="card">
            {{-- @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}
            <div class="col-md-12 mb-0  d-flex justify-content-between align-items-center ">
                <h5 class="card-header text-primary"># Books</h5>
                <a href="{{ route('user.create') }}" type="button" class="btn btn-primary">+ New Users</a>
            </div>
            <div class="menu-divider mb-4"></div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>CNIC No</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>1</td>
                            <td>Ali Ahmed</td>
                            <td>ali@gmail.com</td>
                            <td>03335787345</td>
                            <td>1730145657873</td>
                            <td>Male</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <button type="button" class="dropdown-item deletebtn" onclick="">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
@endpush
{{-- @push('scripts')
    <script src="{{ asset('assets/js/ui-modals.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteBook(book_id) {
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
                        url: '/delete-book/' + book_id,
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
@endpush --}}
