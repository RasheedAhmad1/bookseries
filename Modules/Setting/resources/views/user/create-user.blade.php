@extends('masterlayout.master')

@push('content')
    <!-- Draggable Cards -->
    <div class="row">
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href={{ route('home') }}>Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('setting') }}">Setting</a>
                </li>

                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>

        <!--/ Draggable Cards -->

        <div class="col-xl-12">
            <!-- HTML5 Inputs -->
            <div class="card mb-4">
                <h5 class="card-header text-primary">+ New User</h5>
                <div class="menu-divider mb-4"></div>
                <div class="card-body mt-0">
                    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="title">name</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="title" class="form-control"
                                    placeholder="Name" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleFormControlTextarea1"
                                class="col-sm-2 col-form-label text-sm-end">Email</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="title" class="form-control"
                                    placeholder="Email" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="publisher">Phone Number</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="publisher" class="form-control"
                                    placeholder="Phone no" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="language">CNIC Number</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="language" class="form-control"
                                    placeholder="CNIC No" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="OrderNo">Gender</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="orderNo" class="form-control"
                                    placeholder="Gender" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="online Amount">Country</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="online_amount" class="form-control"
                                    placeholder="Country" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-sm-end" for="title">Province</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="ship_amount" class="form-control"
                                    placeholder="Province" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">District</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="online_amount" class="form-control"
                                    placeholder="District" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Address</label>
                            <div class="col-sm-8">
                                <input type="text" id="#" name="online_amount" class="form-control"
                                    placeholder="Address" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-mt-4">
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
    {{-- <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script> --}}
    <!-- Vendors JS -->
    {{-- <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->
    {{-- ...Some more scripts... --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
