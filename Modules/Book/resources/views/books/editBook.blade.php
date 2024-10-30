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
                        <li class="breadcrumb-item active link-primary" aria-current="page">{{ $breadcrumb['name'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
    <!-- End of Dynamic Breadcrumb -->

    <!--Form -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
<<<<<<< HEAD
                    <h5 class="card-header text-primary">Edit Book</h5>
=======
                    <h5 class="card-header text-primary"># Edit book</h5>
>>>>>>> c9b6d04095477a306a64c9cc43630950235a9a6b
                </div>
                <hr class="my-1 mx-1">
                <form action="{{ url('updatebook', $book->id) }}" method="POST" class="card-body"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Title</label>
                        <div class="col-sm-8">
                            <input type="text" name="title" id="alignment-username" class="form-control"
                                value="{{ old('title', $book->title) }}" />
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Description</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="description" id="editor" class="editor form-control">{{ old('description', $book->description) }}</textarea>
                        </div>
                    </div>

                    {{-- Publisher --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Publisher</label>
                        <div class="col-sm-8">
                            <input type="text" name="publisher" id="alignment-username" class="form-control"
                                value="{{ old('publisher', $book->publisher) }}" />
                        </div>
                    </div>

                    {{-- Language --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Language</label>
                        <div class="col-sm-8">
                            <input type="text" name="language" id="alignment-username" class="form-control"
                                value="{{ old('language', $book->language) }}" />
                        </div>
                    </div>

                    {{-- Order --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Order No.</label>
                        <div class="col-sm-8">
                            <input type="text" name="orderNo" id="alignment-username" class="form-control"
                                value="{{ old('orderNo', $book->orderNo) }}" />
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="row mb-3">
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
                    </div>

                    {{-- Price --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Price</label>
                        <div class="col-sm-8">
                            <input type="text" name="price" id="alignment-username" class="form-control"
                                value="{{ old('price', $book->price) }}" />
                        </div>
                    </div>

                    {{-- Online Amount --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Online Amount</label>
                        <div class="col-sm-8">
                            <input type="text" name="online_amount" id="alignment-username" class="form-control"
                                value="{{ old('online_amount', $book->online_amount) }}" />
                        </div>
                    </div>

                    {{-- Shipping Charges --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Shipping Charges</label>
                        <div class="col-sm-8">
                            <input type="text" name="ship_amount" id="alignment-username" class="form-control"
                                value="{{ old('ship_amount', $book->ship_amount) }}" />
                        </div>
                    </div>

                    {{-- Author --}}
                    <div class="row mb-3">
                        <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Author Name</label>
                        <div class="col-sm-8">
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

                    {{-- Image Gallery --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="gallery">Gallery</label>
                        <div class="col-sm-8">
                            @if ($book->media->isNotEmpty())
                                @foreach ($book->media as $media)
                                    <img src="{{ $media->getUrl() }}" class="image-fluid" alt="Image Book"
                                        width="100px" height="100px">
                                @endforeach
                            @else
                                <p class="form-control">No images found.</p>
                            @endif
                        </div>
                    </div>

                    {{-- upload multimedia files --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="gallery">Upload Image</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="file" name="image[]" id="image_id" multiple>
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
<<<<<<< HEAD
    <script>CKEDITOR.replace('editor');</script>
=======
    <script>
        CKEDITOR.replace('editor');
    </script>
>>>>>>> c9b6d04095477a306a64c9cc43630950235a9a6b
@endpush
