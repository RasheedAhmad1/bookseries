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
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary"># New Book</h5>
                </div>
                <hr class="my-4 mx-n4">
                <form action="{{ route('book.store') }}" method="POST" class="card-body" enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="title">Title</label>
                        <div class="col-sm-8">
<<<<<<< HEAD
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter book title" />
=======
                            <input type="text" name="title" id="alignment-username" class="form-control"
                                placeholder="Enter book title" />
>>>>>>> c9b6d04095477a306a64c9cc43630950235a9a6b
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-publisher">Description</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="description" id="editor" class="editor form-control"
                                placeholder="Enter book description"></textarea>
                        </div>
                    </div>

                    {{-- Publisher --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-publisher">Publisher</label>
                        <div class="col-sm-8">
<<<<<<< HEAD
                            <input type="text" name="publisher" id="alignment-publisher" class="form-control" placeholder="Enter publisher name" />
=======
                            <input type="text" name="publisher" id="alignment-username" class="form-control"
                                placeholder="Enter publisher name" />
>>>>>>> c9b6d04095477a306a64c9cc43630950235a9a6b
                        </div>
                    </div>

                    {{-- Language --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-language">Language</label>
                        <div class="col-sm-8">
<<<<<<< HEAD
                            <input type="text" name="language" id="alignment-language" class="form-control" placeholder="Select language" />
=======
                            <input type="text" name="language" id="alignment-username" class="form-control"
                                placeholder="Select language" />
>>>>>>> c9b6d04095477a306a64c9cc43630950235a9a6b
                        </div>
                    </div>

                    {{-- Order --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-order">Order No.</label>
                        <div class="col-sm-8">
<<<<<<< HEAD
                            <input type="text" name="orderNo" id="alignment-order" class="form-control" placeholder="Order no." />
=======
                            <input type="text" name="orderNo" id="alignment-username" class="form-control"
                                placeholder="Order no." />
>>>>>>> c9b6d04095477a306a64c9cc43630950235a9a6b
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="row mb-3">
                        <label for="status" class="col-sm-2 col-form-label text-sm-end">Availibility Status</label>
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

                    {{-- Price --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Price</label>
                        <div class="col-sm-8">
                            <input type="text" name="price" id="alignment-username" class="form-control"
                                placeholder="0.0" />
                        </div>
                    </div>

                    {{-- Online Amount --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Online Amount</label>
                        <div class="col-sm-8">
                            <input type="text" name="online_amount" id="alignment-username" class="form-control"
                                placeholder="0.0" />
                        </div>
                    </div>

                    {{-- Shipping Charges --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Shipping Charges</label>
                        <div class="col-sm-8">
                            <input type="text" name="ship_amount" id="alignment-username" class="form-control"
                                placeholder="0.0" />
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


                    {{-- Image file --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="gallery">Gallery</label>
                        <div class="col-sm-8">
                            <input class="form-control" type="file" name="image[]" id="image_id" multiple>
                        </div>
                    </div>

                    <hr class="my-4 mx-n4">
                    {{-- Add book button --}}
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
