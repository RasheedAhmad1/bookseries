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
                    <a href="{{ route('sections.index', Crypt::encrypt($book->id)) }}">Sections</a>
                </li>

                <li class="breadcrumb-item active text-primary">New Section</li>
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
                        <li class="fa fa-align-justify"></li> New Section
                    </h5>
                </div>
                <div class="menu-divider mb-4"></div>
                <form action="{{ route('section.store', Crypt::encrypt($book->id)) }}" method="POST" class="card-body"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class=" col-form-label text-sm-end" for="title">Title</label>
                            <input type="text" name="title" id="alignment-username" class="form-control"
                                placeholder="Enter section title" />
                        </div>
                        {{-- Book title --}}
                        <div class="col-sm-6">
                            <label class=" col-form-label text-sm-end" for="title">Book</label>
                            <input type="text" id="alignment-book" class="form-control" value="{{ $book->title }}"
                                disabled />
                            <input type="hidden" name="book_id" id="alignment-book" class="form-control"
                                value="{{ $book->id }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- Language --}}
                        <div class="col-sm-6">
                            <label class="col-form-label text-sm-end" for="alignment-username">Language</label>
                            <input type="text" name="language" id="alignment-book" class="form-control"
                                placeholder="Enter language" />
                        </div>

                        {{-- MCQ's --}}
                        <div class="col-sm-6">
                            <label class="col-form-label text-sm-end" for="alignment-username">MCQ's</label>
                            <input type="text" name="mcqs" id="alignment-username" class="form-control"
                                placeholder="Enter mcqs" />
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mb-3 mt-5">
                        <div class="col-sm-12">
                            <label class="col-form-label text-sm-end" for="alignment-publisher">Description</label>
                            <textarea type="text" name="description" id="editor" class="form-control" placeholder="Enter section description"></textarea>
                        </div>
                    </div>

                    {{-- Image file --}}
                    <div class="row mb-3 mt-3">
                        <div class="col-sm-12">
                            <div id="app">
                                <file-uploader :unlimited="true" collection="images"
                                    :tokens="{{ json_encode(old('media', [])) }}" label="Upload Images"
                                    notes="Supported types: jpeg, png,jpg,gif"
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
            filebrowserUploadUrl: "{{ route('image_section.upload') }}?_token={{ csrf_token() }}",
            filebrowserUploadMethod: 'form',
            removeDialogTabs: 'image:Link;image:advanced', // Optional: remove extra tabs in the image dialog
        });
    </script>

    <script>
        new Vue({
            el: '#app'
        })
    </script>
@endpush
