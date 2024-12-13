@extends('masterLayout.master')


@push('content')
    <div class="row">
        <div class="col-12">

            <!-- Traffic sources -->
            <div class="card">
                <div class="card-header header-elements-inline d-flex justify-content-between align-items-center">
                    <h6 class="card-title pb-0 mb-0">{{ $title ?? 'User Listings' }}</h6>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">+ New User</a>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive" style="min-height: 200px">
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
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.show', $encrypted_id) }}"><i
                                                                    class="bx bx-show-alt me-1"></i> Show</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.edit', $encrypted_id) }}"><i
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
            </div>
            <!-- /traffic sources -->
        </div>
    </div>
@endpush
