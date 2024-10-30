{{-- @extends('book::layouts.master') --}}
@extends('masterLayout.master')

@push('content')

    <!-- Breadcrumb -->
    @include('layouts.breadcrumb')

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
                    <h5 class="card-header text-primary">Books</h5>
                    <a href="{{ route('book.create') }}" class="btn btn-primary">Add Book</a>
                </div>
                <div class="table-responsive text-nowrap card-body">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>S. No.</th>
                                <th>Title</th>
                                <th>Publisher</th>
                                <th>Language</th>
                                <th>Auther</th>
                                <th>Enabled</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($books as $key => $book)
                                <tr>
                                    <td>{{ ++$key }}</td> <!-- Serial Number -->
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>{{ $book->language }}</td>
                                    <td>{{ $book->author->name }}</td>
                                    <td>{{ $book->enabled }}</td>
                                    <td>{{ $book->price }}</td>
                                    @php
                                        $id = Crypt::encrypt($book->id)
                                    @endphp
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ url('editbook/' . $id) }}"
                                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                                >
                                                <a class="dropdown-item" href="{{ url('deletebook/' . $id ) }}"
                                                ><i class="bx bx-trash me-1"></i> Delete</a
                                                >
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

{{-- @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush --}}
