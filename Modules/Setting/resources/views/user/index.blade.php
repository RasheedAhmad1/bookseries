@extends('masterLayout.master')

{{-- Custom CSS --}}
@push('style')
@endpush

@push('content')
    <!-- Dynamic Breadcrumb -->
    {{-- <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$loop->last)
                        <!-- Linkes for items-->
                        <li class="breadcrumb-item">
                            <a href="{{ $breadcrumb['url'] }}" class="anchor-link">{{ $breadcrumb['name'] }}</a>
                        </li>
                    @else
                        <!-- Active last item but not a link -->
                        <li class="breadcrumb-item active link-primary" aria-current="page">{{ $breadcrumb['name'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div> --}}
    <!--/ Dynamic Breadcrumb -->

    <!-- Table -->
    <div class="row">
        <div class="col-xxl">
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
                        <li class="fa fa-align-justify"></li> Users
                    </h5>

                    <a href="{{ route('user.create') }}" class="btn btn-primary">+ New User</a>
                </div>
                <div class="menu-divider mb-4"></div>
                <div class="table-responsive text-nowrap card-body">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>S. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge bg-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    @php
                                        $encrypted_id = Crypt::encrypt($user->id);
                                    @endphp
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('user.show', $encrypted_id) }}"><i
                                                        class="bx bx-show-alt me-1"></i> Show</a>
                                                <a class="dropdown-item" href="{{ route('user.edit', $encrypted_id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <button type="button" class="dropdown-item deletebtn"
                                                    onclick="deleteUser('{{ $encrypted_id }}')">
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
    </div>
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/ui-modals.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteUser(encrypted_id) {
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
                        url: '/users/delete-user/' + encrypted_id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "The user has been deleted.",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "There was an issue deleting the user.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
