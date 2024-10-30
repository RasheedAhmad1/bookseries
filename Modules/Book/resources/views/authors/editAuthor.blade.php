{{-- @extends('book::layouts.master') --}}
@extends('masterLayout.master')

@push('content')
    <!-- Dynamic Breadcrumb -->
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$loop->last)
                        <!-- Linkes for items-->
                        <li class="breadcrumb-item anchor-link">
                            <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                        </li>
                    @else
                        <!-- Active last item but not a link -->
                        <li class="breadcrumb-item active text-primary" aria-current="page">{{ $breadcrumb['name'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
    <!-- End of Dynamic Breadcrumb -->

    <!--Form -->
    <div class="row">
        <div class="col-xl-12">
            <!-- HTML5 Inputs -->
            <div class="card mb-4">
<<<<<<< HEAD
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary">Edit Author</h5>
                </div>
                <hr class="my-4 mx-n4">
                <form action="{{ url('updateauthor', $author->id) }}" method="POST" class="card-body">
                    @csrf
=======
                <h5 class="card-header text-primary"># Edit Author</h5>
                <div class="menu-divider mb-4"></div>
                <div class="card-body mt-0">
                    <form action="{{ url('updateauthor', $author->id) }}" method="POST" class="card-body">
                        @csrf
>>>>>>> c9b6d04095477a306a64c9cc43630950235a9a6b

                        {{-- Name --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" id="alignment-username" class="form-control"
                                    value="{{ old('name', $author->name) }}" />
                            </div>
                        </div>

                        {{-- Slug --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Slug</label>
                            <div class="col-sm-8">
                                <input type="text" name="slug" id="alignment-userslug" class="form-control"
                                    value="{{ old('slug', $author->slug) }}" />
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Description</label>
                            <div class="col-sm-8">
                                <textarea type="text" name="description" id="editor" class="editor form-control">{!! $author->description !!}</textarea>
                            </div>
                        </div>

                        {{-- Status --}}
                        {{-- <div class="row mb-3">
                        <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Availibility Status</label>
                        <div class="col-sm-8">
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
                    </div> --}}

                        {{-- Save button --}}
                        <hr class="my-4 mx-n4">
                        <div class="card-footer col-md-12 d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary">Save</button>
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
