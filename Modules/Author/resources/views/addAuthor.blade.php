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
                <h5 class="card-header text-primary"># New Author</h5>
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
