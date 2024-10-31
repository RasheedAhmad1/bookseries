{{-- @extends('book::layouts.master') --}}
@extends('masterLayout.master')

@push('content')

    <!-- Breadcrumb -->
    @include('layouts.breadcrumb')

    <!--Form -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary">Add Test</h5>
                </div>
                <hr class="my-4 mx-n4">
                <form action="{{ route('test.store') }}" method="POST" class="card-body">
                    @csrf

                    {{-- Title --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="title">Title</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title" />
                        </div>
                    </div>

                    {{-- Slug --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="answer">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug" />
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="marks">Description</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="description" id="editor" class="editor form-control" placeholder="Enter book description"></textarea>
                        </div>
                    </div>

                    {{-- Language --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="language">Language</label>
                        <div class="col-sm-8">
                            <input type="text" name="language" id="order" class="form-control" placeholder="Enter language" />
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label text-sm-end">Test Status</label>
                        <div class="col-sm-8">
                            <select id="status" name="enabled" class="form-select">
                                <option value="">Select status</option>
                                @foreach ($statuses as $key => $value)
                                    <option value="{{ $key }}">
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Payment --}}
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label text-sm-end">Test Payemnt</label>
                        <div class="col-sm-8">
                            <select id="status" name="ispaid" class="form-select">
                                <option value="">Select status</option>
                                @foreach ($payment as $key => $value)
                                    <option value="{{ $key }}">
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Price --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="price">Price</label>
                        <div class="col-sm-8">
                            <input type="number" name="link" id="price" class="form-control" placeholder="Enter price" />
                        </div>
                    </div>

                    {{-- Test Date --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="test-date">Test Date</label>
                        <div class="col-sm-8">
                            <input type="date" name="date" id="test-date" class="form-control" placeholder="Enter test date" />
                        </div>
                    </div>

                    {{-- Announce Date --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="announce-date">Announce Date</label>
                        <div class="col-sm-8">
                            <input type="date" name="announce_date" id="announce-date" class="form-control" placeholder="Enter announce date" />
                        </div>
                    </div>

                    {{-- Last Date --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="last-date">Last Date</label>
                        <div class="col-sm-8">
                            <input type="date" name="last_date" id="last-date" class="form-control" placeholder="Enter last date" />
                        </div>
                    </div>

                    {{-- Indivudual Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="individual-result">Indivudual Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="individual_result" id="individual-result" class="form-control" placeholder="Enter individual result" />
                        </div>
                    </div>

                    {{-- Overall Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="overall-result">Overall Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="overall_result" id="overall-result" class="form-control" placeholder="Enter overall result" />
                        </div>
                    </div>

                    {{-- Province Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="province-result">Province Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="province_result" id="province-result" class="form-control" placeholder="Enter province result" />
                        </div>
                    </div>

                    {{-- Zone Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="zone-result">Zone Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="zone_result" id="zone-result" class="form-control" placeholder="Enter zone result" />
                        </div>
                    </div>

                    {{-- District Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="district-result">District Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="district_result" id="district-result" class="form-control" placeholder="Enter district result" />
                        </div>
                    </div>

                    {{-- Instant Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="instant-result">Instant Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="instant_result" id="instant-result" class="form-control" placeholder="Enter instant result" />
                        </div>
                    </div>

                    {{-- Test Duration --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="instant-result">Test Duration</label>
                        <div class="col-sm-8">
                            <input type="number" name="test_duration" id="test-duration" class="form-control" placeholder="Enter test duration" />
                        </div>
                    </div>

                    {{-- Is Finished --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="is-finished">Is Finished</label>
                        <div class="col-sm-8">
                            <input type="number" name="is_finished" id="is-finished" class="form-control" placeholder="Enter test duration" />
                        </div>
                    </div>

                    {{-- Is Hidden --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="instant-result">Is Hidden</label>
                        <div class="col-sm-8">
                            <input type="number" name="is_hidden" id="is-hidden" class="form-control" placeholder="Enter is hidden" />
                        </div>
                    </div>

                    {{-- Add book button --}}
                    <hr class="my-4 mx-n4">
                    <div class="card-footer col-md-12 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script src="{{ asset('assets/editors/ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace('editor');</script>
@endpush
