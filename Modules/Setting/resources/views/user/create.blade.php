@extends('masterLayout.master')
@push('content')
    <!-- Dynamic Breadcrumb -->
    {{-- <div class="row">
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
    </div> --}}
    <!--/ Dynamic Breadcrumb -->

    <!--Form -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary">
                        <li class="fa fa-align-justify"></li> New User
                    </h5>
                </div>
                <div class="menu-divider mb-4"></div>
                <form action="{{ route('user.store') }}" method="POST" class="card-body">
                    @csrf

                    {{-- Name --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="title">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="alignment-name" class="form-control"
                                placeholder="Enter user name" />
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-publisher">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" id="alignment-email" class="form-control"
                                placeholder="Enter user email" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-publisher">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" id="alignment-password" class="form-control"
                                placeholder="Enter user password" />
                        </div>
                    </div>


                    {{-- Phone number --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-phone">Phone No.</label>
                        <div class="col-sm-8">
                            <input type="text" name="phone" id="alignment-phone" class="form-control"
                                placeholder="Enter phone name" />
                        </div>
                    </div>

                    {{-- CNIC --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-CNIC">CNIC</label>
                        <div class="col-sm-8">
                            <input type="text" name="cnic" id="alignment-cnic" class="form-control"
                                placeholder="Enter CNIC" />
                        </div>
                    </div>

                    {{-- Gender --}}
                    <div class="row mb-3">
                        <label for="Gender" class="col-sm-2 col-form-label text-sm-end">Gender</label>
                        <div class="col-sm-8">
                            <input type="text" name="gender" id="alignment-gender" class="form-control"
                                placeholder="Enter gender" />
                        </div>
                    </div>

                    {{-- Country --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Country</label>
                        <div class="col-sm-8">
                            <input type="text" name="country" id="alignment-country" class="form-control"
                                placeholder="Enter country" />
                        </div>
                    </div>

                    {{-- Province --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Province</label>
                        <div class="col-sm-8">
                            <input type="text" name="province" id="alignment-province" class="form-control"
                                placeholder="Enter province" />
                        </div>
                    </div>

                    {{-- District --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-district">District</label>
                        <div class="col-sm-8">
                            <input type="text" name="district" id="alignment-district" class="form-control"
                                placeholder="Enter district" />
                        </div>
                    </div>

                    {{-- Porfessional --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-address">Professional
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="professional" id="alignment-professional" class="form-control"
                                placeholder="Enter professional" />
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-professional">Address
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="address" id="alignment-address" class="form-control"
                                placeholder="Enter address" />
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
