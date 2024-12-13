{{-- @extends('book::layouts.master') --}}
@extends('masterLayout.master')

@push('content')
    <!-- Dynamic Breadcrumb -->
    <div class="row">
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

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
                <li class="breadcrumb-item">
                    <a href="{{ route('questions.index', Crypt::encrypt($question->unit_id)) }}">Questions</a>
                </li>
                <li class="breadcrumb-item active text-primary">Edit Question</li>
            </ol>
        </nav>
    </div>
    <!--/ Dynamic Breadcrumb -->

    <!--Form -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary">
                        <li class="fa fa-align-justify"></li> Edit Question
                    </h5>
                </div>
                <div class="menu-divider mb-4"></div>
                <form action="{{ route('question.update', Crypt::encrypt($question->id)) }}" method="POST"
                    class="card-body" enctype="multipart/form-data">
                    @csrf

                    {{-- Type --}}
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class=" col-form-label text-sm-end" for="title">Type</label>
                            <input type="text" name="type" id="alignment-username" class="form-control"
                                value="{{ $question->type }}" />
                        </div>
                        {{-- Unit title --}}
                        <div class="col-sm-6">
                            <label class=" col-form-label text-sm-end" for="title">Unit</label>
                            <input type="text" id="alignment-book" class="form-control" value="{{ $unit->title }}"
                                disabled />
                            <input type="hidden" name="unit_id" id="alignment-unit" class="form-control"
                                value="{{ $unit->id }}" />
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mb-3 mt-5">
                        <div class="col-sm-12">
                            <label class="col-form-label text-sm-end" for="alignment-publisher">Question Description</label>
                            <textarea type="text" name="description" id="editor" class="form-control" placeholder="Enter section description">{{ $question->description }}</textarea>
                        </div>
                    </div>

                    {{-- Image file --}}
                    <div class="row mb-3 mt-3">
                        <div class="col-sm-12">
                            <div id="app">
                                <file-uploader :media="{{ $question->getMediaResource('images') }}" :unlimited="true"
                                    collection="images" :tokens="{{ json_encode(old('media', [])) }}"
                                    label="Question Attachment" notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"></file-uploader>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- Answer --}}
                        <div class="col-sm-6">
                            <label class="col-form-label text-sm-end" for="alignment-username">Answer</label>
                            <input type="text" name="answer" id="alignment-book" class="form-control"
                                value="{{ $question->answer }}" />
                        </div>

                        {{-- Marks --}}
                        <div class="col-sm-6">
                            <label class="col-form-label text-sm-end" for="alignment-username">Marks</label>
                            <input type="text" name="marks" id="alignment-username" class="form-control"
                                value="{{ $question->marks }}" />
                        </div>
                    </div>

                    {{-- Answer Explanation --}}
                    <div class="row mb-3 mt-5">
                        <div class="col-sm-12">
                            <label class="col-form-label text-sm-end" for="alignment-publisher">Answer Explanation</label>
                            <textarea type="text" name="explanation" id="editor2" class="form-control" placeholder="Enter section description">{{ $question->explanation }}</textarea>
                        </div>
                    </div>

                    {{-- Image file --}}
                    <div class="row mb-3 mt-3">
                        <div class="col-sm-12">
                            {{-- <div id="app2">
                                <file-uploader :media="{{ $question->getMediaResource('images') }}" :unlimited="true"
                                    collection="images" :tokens="{{ json_encode(old('media', [])) }}"
                                    label="Answer Attachment" notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"></file-uploader>
                            </div> --}}
                            <div id="app2">
                                <file-uploader :media="{{ $question->getMediaResource('images') }}" :unlimited="true"
                                    collection="images" :tokens="{{ json_encode(old('media', [])) }}"
                                    label="Answer Attachment" notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"></file-uploader>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4 mx-1">
                    {{-- Add book button --}}
                    <div class="card-footer col-md-12 d-flex justify-content-end align-items-center g-5">
                        <a href="" type="button" class="btn btn-secondary">Cancel</a>
                        &nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script src="{{ asset('assets/editors/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-file-uploader"></script>
    <script>
        CKEDITOR.replace('editor', {
            extraPlugins: 'uploadimage', // Enable the upload image plugin
            filebrowserUploadUrl: "{{ route('image_question.upload') }}?_token={{ csrf_token() }}",
            filebrowserUploadMethod: 'form',
            removeDialogTabs: 'image:Link;image:advanced', // Optional: remove extra tabs in the image dialog
        });
    </script>

    <script>
        CKEDITOR.replace('editor2', {
            extraPlugins: 'uploadimage', // Enable the upload image plugin
            filebrowserUploadUrl: "{{ route('image_question.upload') }}?_token={{ csrf_token() }}",
            filebrowserUploadMethod: 'form',
            removeDialogTabs: 'image:Link;image:advanced', // Optional: remove extra tabs in the image dialog
        });
    </script>

    <script>
        new Vue({
            el: '#app'
        })
    </script>

    <script>
        new Vue({
            el: '#app2'
        })
    </script>
@endpush
