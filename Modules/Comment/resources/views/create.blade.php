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
                    <a href="{{ url('comments') }}">Comment</a>
                </li>

                <li class="breadcrumb-item active text-primary">New Comment</li>
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
                        <li class="fa fa-align-justify"></li> New Comment
                    </h5>
                </div>
                <div class="menu-divider mb-4"></div>
                <form action="{{ route('comment.store') }}" method="POST" class="card-body" enctype="multipart/form-data">
                    @csrf

                    {{-- Name --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="name">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter name" />
                        </div>
                    </div>

                    {{-- Comment --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="comment">Comment</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="comment" id="editor" class="editor form-control" placeholder="Enter comment"></textarea>
                        </div>
                    </div>

                    {{-- Comment Status --}}
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label text-sm-end">Comment Status</label>
                        <div class="col-sm-8">
                            <select id="status" name="status" class="form-select">
                                <option value="">Select status</option>
                                @foreach ($statuses as $key => $value)
                                    <option value="{{ $key }}">
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr class="my-4 mx-n4">

                    {{-- Add Comment button --}}
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
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
