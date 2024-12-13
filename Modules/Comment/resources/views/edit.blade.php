{{-- @extends('book::layouts.master') --}}
@extends('masterLayout.master')

@push('content')
    <!-- Dynamic Breadcrumb -->
    <div class="row">
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="{{ url('comments') }}">Commnets</a>
                </li>

                <li class="breadcrumb-item active text-primary">Edit Comment</li>
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
                        <li class="fa fa-align-justify"></li> Edit Comment
                    </h5>
                </div>
                <div class="menu-divider mb-4"></div>
                <form action="{{ url('update-comment', $comment->id) }}" method="POST" class="card-body">
                    @csrf

                    {{-- Name --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="name">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $comment->name) }}" />
                        </div>
                    </div>

                    {{-- Comment --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="comment">Comment</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="comment" id="editor" class="editor form-control">{{ old('comment', $comment->comment) }}</textarea>
                        </div>
                    </div>

                    {{-- Comment Status --}}
                    <div class="row mb-3">
                        <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Comment Status</label>
                        <div class="col-sm-8">
                            <select id="defaultSelect" name="status" class="form-select">
                                <option>Select status</option>
                                @foreach ($statuses as $key => $value)
                                    <option value="{{ $key }}"
                                        {{ old('status', $comment->status) == $key ? 'selected' : ' ' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Add book button --}}
                    <hr class="my-1 mx-1">
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
