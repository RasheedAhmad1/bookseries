@extends('masterLayout.master')
@push('content')

    <!-- Form -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary">
                        <i class="fa fa-align-justify"></i> New User
                    </h5>
                </div>

                <form action="{{ route('user.store') }}" method="POST" class="card-body">
                    @csrf

                    {{-- Name and Email --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter user name" />
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter user email" />
                        </div>
                    </div>

                    {{-- Password and Phone --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter user password" />
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone No.</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                placeholder="Enter phone number" />
                        </div>
                    </div>

                    {{-- CNIC and Gender --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cnic" class="form-label">CNIC</label>
                            <input type="text" name="cnic" id="cnic" class="form-control"
                                placeholder="Enter CNIC" />
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <input type="text" name="gender" id="gender" class="form-control"
                                placeholder="Enter gender" />
                        </div>
                    </div>

                    {{-- Country and Province --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" name="country" id="country" class="form-control"
                                placeholder="Enter country" />
                        </div>
                        <div class="col-md-6">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" name="province" id="province" class="form-control"
                                placeholder="Enter province" />
                        </div>
                    </div>

                    {{-- District and Professional --}}
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="district" class="form-label">District</label>
                            <input type="text" name="district" id="district" class="form-control"
                                placeholder="Enter district" />
                        </div>
                        <div class="col-md-6">
                            <label for="professional" class="form-label">Professional</label>
                            <input type="text" name="professional" id="professional" class="form-control"
                                placeholder="Enter profession" />
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            placeholder="Enter address" />
                    </div>

                    {{-- Role --}}
                    <div class="mb-3">
                        <label for="roles" class="form-label">Role</label>
                        <select name="roles[]" id="roles" class="form-select" multiple>
                            @foreach ($roles as $value => $label)
                                <option value="{{ $value }}">{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('users.index') }}" class="btn btn-warning me-2">Back</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
