@extends('masterLayout.master')
@push('style')
@endpush
@push('content')
    <!-- Dynamic Breadcrumb -->
    <div class="row">
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href={{ route('home') }}>Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('books.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('books.index') }}">Books</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('sections.index', Crypt::encrypt($section->book_id)) }}">Sections</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('units.index', Crypt::encrypt($unit->section_id)) }}">Units</a>
                </li>
                <li class="breadcrumb-item active text-primary">Questions</li>
            </ol>
        </nav>
    </div>
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
                        <li class="fa fa-align-justify"></li> Questions
                    </h5>
                    <a href="{{ route('question.create', Crypt::encrypt($unit->id)) }}" class="btn btn-primary">+ New
                        Question</a>
                </div>
                <div class="menu-divider mb-4"></div>
                <div class="table-responsive text-nowrap card-body">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>S. No.</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($questions as $key => $question)
                                <tr>
                                    <td>{{ ++$key }}</td> <!-- Serial Number -->
                                    <td>{!! $question->description !!}</td>
                                    <td>{{ $question->answer }}</td>
                                    <td>{{ $question->type }}</td>
                                    @php
                                        $id = Crypt::encrypt($question->id);
                                    @endphp
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- <a class="dropdown-item" href="{{ route('question.show', $id) }}">
                                                    <i class="bx bx-show-alt me-1"></i>
                                                    Show
                                                </a> --}}
                                                <a class="dropdown-item" href="{{ route('question.edit', $id) }}">
                                                    <i class="bx bx-edit-alt me-1"></i>
                                                    Edit
                                                </a>
                                                <button type="button" class="dropdown-item deletebtn"
                                                    onclick="deleteQuestion('{{ $id }}')">
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
        function deleteQuestion(question_id) {
            console.log(question_id);
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
                        url: '/delete-question/' + question_id,
                        type: 'GET',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "The question has been deleted.",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "There was an issue deleting the question.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
