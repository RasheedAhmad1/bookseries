{{-- @extends('book::layouts.master') --}}
@extends('masterLayout.master')

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

                <li class="breadcrumb-item active text-primary">Edit Book</li>
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
                        <li class="fa fa-align-justify"></li> Edit Book
                    </h5>
                </div>
                <div class="menu-divider mb-4"></div>
                <form action="{{ url('update-book', $book->id) }}" method="POST" class="card-body"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Title --}}
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label class=" col-form-label text-sm-end" for="title">Title</label>
                            <input type="text" name="title" id="alignment-username" class="form-control"
                                value="{{ old('title', $book->title) }}" />
                        </div>

                        <div class="col-sm-6">
                            <label for="defaultSelect" class="col-form-label text-sm-end">Author Name</label>
                            <select id="defaultSelect" name="author_id" class="form-select">
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ old('author_id', $book->author_id) == $author->id ? 'selected' : ' ' }}>
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- Price --}}
                        <div class="col-sm-6">
                            <label class="col-form-label text-sm-end" for="alignment-username">Price</label>
                            <input type="text" name="price" id="alignment-username" class="form-control"
                                value="{{ old('price', $book->price) }}" />
                        </div>

                        {{-- Online Amount --}}
                        <div class="col-sm-6">
                            <label class="col-form-label text-sm-end" for="alignment-username">Online Amount</label>
                            <input type="text" name="online_amount" id="alignment-username" class="form-control"
                                value="{{ old('online_amount', $book->online_amount) }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- Shipping Charges --}}
                        <div class="col-sm-6">
                            <label class="col-form-label text-sm-end" for="alignment-username">Shipping Charges</label>
                            <input type="text" name="ship_amount" id="alignment-username" class="form-control"
                                value="{{ old('ship_amount', $book->ship_amount) }}" />
                        </div>
                        {{-- Status --}}
                        <div class="col-sm-6">
                            <label class="col-form-label text-sm-end" for="alignment-order">Order No.</label>
                            <input type="text" name="orderNo" id="alignment-username" class="form-control"
                                value="{{ old('orderNo', $book->orderNo) }}" />

                        </div>
                    </div>

                    <div class="row mb-3">
                        {{-- Order --}}
                        <div class="col-sm-12">
                            <label for="status" class="col-form-label text-sm-end">Availibility Status</label>
                            <select id="defaultSelect" name="status" class="form-select">
                                <option>Select status</option>
                                @foreach ($statuses as $key => $value)
                                    <option value="{{ $key }}"
                                        {{ old('status', $book->status) == $key ? 'selected' : ' ' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Image file
                        <div class="col-sm-6">
                            <div id="app">
                                <file-uploader :media="{{ $book->getMediaResource('images') }}" :unlimited="true"
                                    collection="images" :tokens="{{ json_encode(old('media', [])) }}" label="Upload Images"
                                    notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"></file-uploader>
                            </div>
                        </div> --}}
                    </div>

                    {{-- Description --}}
                    <div class="row mb-3 mt-5">
                        <div class="col-sm-12">
                            <label class="col-form-label text-sm-end" for="alignment-publisher">Description</label>
                            <textarea type="text" name="description" id="editor" class="form-control" placeholder="Enter book description">{{ old('description', $book->description) }}</textarea>
                        </div>
                    </div>

                    {{-- Image file --}}
                    <div class="row mb-3 mt-3">
                        <div class="col-sm-12">
                            <div id="app">
                                <file-uploader :media="{{ $book->getMediaResource('images') }}" :unlimited="true"
                                    collection="images" :tokens="{{ json_encode(old('media', [])) }}" label="Upload Images"
                                    notes="Supported types: jpeg, png,jpg,gif"
                                    accept="image/jpeg,image/png,image/jpg,image/gif"></file-uploader>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4 mx-1">
                    {{-- Add book button --}}
                    <div class="card-footer col-md-12 d-flex justify-content-end align-items-center g-5">
                        <a href="{{ route('books.index') }}" type="button" class="btn btn-secondary">Cancel</a>
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
            filebrowserUploadUrl: "{{ route('image.upload') }}?_token={{ csrf_token() }}",
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
