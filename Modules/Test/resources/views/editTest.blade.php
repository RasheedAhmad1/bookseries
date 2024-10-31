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
                    <h5 class="card-header text-primary">Edit Test</h5>
                </div>
                <hr class="my-4 mx-n4">
                <form action="{{ url('updatetest', $test->id) }}" method="POST" class="card-body">
                    @csrf

                    {{-- Title --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="title">Title</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $test->title) }}" />
                        </div>
                    </div>

                    {{-- Slug --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="answer">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $test->slug) }}" />
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="marks">Description</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="description" id="editor" class="editor form-control">{{ old('description', $test->description) }}</textarea>
                        </div>
                    </div>

                    {{-- Language --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="language">Language</label>
                        <div class="col-sm-8">
                            <input type="text" name="language" id="order" class="form-control" value="{{ old('language', $test->language) }}" />
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label text-sm-end">Test Status</label>
                        <div class="col-sm-8">
                            <select id="status" name="enabled" class="form-select">
                                <option value="">Select status</option>
                                @foreach ($statuses as $key => $value)
                                    <option value="{{ $key }}"
                                        {{ old('enabled', $test->enabled) == $key ? 'selected' : ' ' }}>
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
                                    <option value="{{ $key }}"
                                        {{ old('ispaid', $test->idpaid) == $key ? 'selected' : ' ' }}>
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
                            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $test->price) }}" />
                        </div>
                    </div>

                    {{-- Test Date --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="test-date">Test Date</label>
                        <div class="col-sm-8">
                            <input type="date" name="date" id="test-date" class="form-control" value="{{ $test_date }}" />
                        </div>
                    </div>

                    {{-- Announce Date --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="announce-date">Announce Date</label>
                        <div class="col-sm-8">
                            <input type="date" name="announce_date" id="announce-date" class="form-control" value="{{ $announce_date }}" />
                        </div>
                    </div>

                    {{-- Last Date --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="last-date">Last Date</label>
                        <div class="col-sm-8">
                            <input type="date" name="last_date" id="last-date" class="form-control" value="{{ $last_date }}" />
                        </div>
                    </div>

                    {{-- Indivudual Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="individual-result">Indivudual Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="individual_result" id="individual-result" class="form-control" value="{{ old('individual_result', $test->individual_result) }}" />
                        </div>
                    </div>

                    {{-- Overall Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="overall-result">Overall Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="overall_result" id="overall-result" class="form-control" value="{{ old('overall_result', $test->overall_result) }}" />
                        </div>
                    </div>

                    {{-- Province Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="province-result">Province Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="province_result" id="province-result" class="form-control" value="{{ old('province_result', $test->province_result) }}" />
                        </div>
                    </div>

                    {{-- Zone Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="zone-result">Zone Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="zone_result" id="zone-result" class="form-control" value="{{ old('zone_result', $test->zone_result) }}" />
                        </div>
                    </div>

                    {{-- District Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="district-result">District Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="district_result" id="district-result" class="form-control" value="{{ old('district_result', $test->district_result) }}" />
                        </div>
                    </div>

                    {{-- Instant Result --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="instant-result">Instant Result</label>
                        <div class="col-sm-8">
                            <input type="number" name="instant_result" id="instant-result" class="form-control" value="{{ old('instant_result', $test->instant_result) }}" />
                        </div>
                    </div>

                    {{-- Test Duration --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="instant-result">Test Duration</label>
                        <div class="col-sm-8">
                            <input type="number" name="test_duration" id="test-duration" class="form-control" value="{{ old('test_duration', $test->test_duration) }}" />
                        </div>
                    </div>

                    {{-- Is Finished --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="is-finished">Is Finished</label>
                        <div class="col-sm-8">
                            <input type="number" name="is_finished" id="is-finished" class="form-control" value="{{ old('is_finished', $test->is_finished) }}" />
                        </div>
                    </div>

                    {{-- Is Hidden --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="instant-result">Is Hidden</label>
                        <div class="col-sm-8">
                            <input type="number" name="is_hidden" id="is-hidden" class="form-control" value="{{ old('is_hidden', $test->is_hidden) }}" />
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
