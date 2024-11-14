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
                    <a href="{{ url('authors') }}">Authors</a>
                </li>

                <li class="breadcrumb-item active text-primary">New Author</li>
            </ol>
        </nav>
    </div>
    <!--/ Dynamic Breadcrumb -->
    <!--Form -->
    <div class="row">
        <div class="col-xl-12">
            <!-- HTML5 Inputs -->
            <div class="card mb-4">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary">
                        <li class="fa fa-align-justify"></li> New Author
                    </h5>
                </div>
                <div class="menu-divider mb-4"></div>
                <div class="card-body mt-0">
                    <form action="{{ route('author.store') }}" method="POST" class="card-body">
                        @csrf

                        {{-- Name --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" id="alignment-username" class="form-control"
                                    placeholder="Enter author name" />
                            </div>
                        </div>

                        {{-- Slug --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Slug</label>
                            <div class="col-sm-8">
                                <input type="text" name="slug" id="alignment-username" class="form-control"
                                    placeholder="Enter author slug" />
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Description</label>
                            <div class="col-sm-8">
                                <textarea type="text" name="description" id="editor" class="editor form-control"
                                    placeholder="Enter author description"></textarea>
                            </div>
                        </div>

                        <hr class="my-4 mx-1">
                        {{-- Add book button --}}
                        <div class="row mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-md-4 text-center">
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script src="{{ asset('assets/editors/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
