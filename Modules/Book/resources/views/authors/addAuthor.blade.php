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
                    <h5 class="card-header text-primary">Add Author</h5>
                </div>
                <hr class="my-4 mx-n4">
                <form action="{{ route('author.store'); }}" method="POST" class="card-body">
                    @csrf

                    {{-- Name --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="alignment-username" class="form-control" placeholder="Enter author name" />
                        </div>
                    </div>

                    {{-- Name --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" name="slug" id="alignment-username" class="form-control" placeholder="Enter author slug" />
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Description</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="description" id="editor" class="editor form-control" placeholder="Enter author description"></textarea>
                        </div>
                    </div>

                    {{-- Publisher --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Publisher</label>
                        <div class="col-sm-8">
                            <input type="text" name="publisher" id="alignment-username" class="form-control" placeholder="Enter publisher name" />
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="row mb-3">
                        <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Status</label>
                        {{-- <div class="col-sm-8">
                            <select id="defaultSelect" name="status" class="form-select">
                                <option value="">Select status</option>
                                @foreach ($statuses as $key => $value)
                                    <option value="{{ $key }}">
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>

                    {{-- Price --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Price</label>
                        <div class="col-sm-8">
                            <input type="text" name="price" id="alignment-username" class="form-control" placeholder="0.0" />
                        </div>
                    </div>

                    {{-- Online Amount --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Online Amount</label>
                        <div class="col-sm-8">
                            <input type="text" name="online_amount" id="alignment-username" class="form-control" placeholder="0.0" />
                        </div>
                    </div>

                    {{-- Shipping Charges --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Shipping Charges</label>
                        <div class="col-sm-8">
                            <input type="text" name="ship_amount" id="alignment-username" class="form-control" placeholder="0.0" />
                        </div>
                    </div>

                    {{-- Author --}}
                    <div class="row mb-3">
                        <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Author Name</label>
                        <div class="col-sm-8">
                            <select id="defaultSelect" name="author_id" class="form-select">
                                <option value="">Select author</option>
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">
                                        {{ $author->name }}
                                    </option>
                                @endforeach
                            </select>
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
