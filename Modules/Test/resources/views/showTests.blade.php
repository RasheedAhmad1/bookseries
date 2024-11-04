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
                    <h5 class="card-header text-primary">Tests</h5>
                    <a href="{{ route('test.create') }}" class="btn btn-primary">Add Test</a>
                </div>
                <div class="table-responsive text-nowrap card-body">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>S. No.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Test Date</th>
                                <th>Announce Date</th>
                                <th>Last Date</th>
                                <th>Individual Result</th>
                                <th>Overall Result</th>
                                <th>Province Result</th>
                                <th>Zone Result</th>
                                <th>District Result</th>
                                <th>Instant Result</th>
                                <th>Test Duration</th>
                                <th>Is Finished</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($tests as $key => $test)
                                <tr>
                                    <td>{{ ++$key }}</td> <!-- Serial Number -->
                                    <td>{{ $test->title }}</td>
                                    <td>{!! $test->description !!}</td>
                                    <td>{{ $test->price }}</td>
                                    <td>{{ $test->date }}</td>
                                    <td>{{ $test->announce_date }}</td>
                                    <td>{{ $test->last_date }}</td>
                                    <td>{{ $test->individual_result }}</td>
                                    <td>{{ $test->overall_result }}</td>
                                    <td>{{ $test->province_result }}</td>
                                    <td>{{ $test->zone_result }}</td>
                                    <td>{{ $test->district_result }}</td>
                                    <td>{{ $test->instant_result }}</td>
                                    <td>{{ $test->test_duration }}</td>
                                    <td>{{ $test->is_finished }}</td>
                                    @php
                                        $id = Crypt::encrypt($test->id)
                                    @endphp
                                    <td>
                                        <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('edittest/' . $id ) }}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="{{ url('deletetest/' . $id ) }}">
                                                <i class="bx bx-trash me-1"></i>
                                                Delete
                                            </a>
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
