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
                        <li class="breadcrumb-item active link-primary" aria-current="page">{{ $breadcrumb['name'] }}
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div> --}}
    <!-- End of Dynamic Breadcrumb -->

    <!--Form -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary">
                        <li class="fa fa-align-justify"></li> Edit user
                    </h5>
                </div>
                <div class="menu-divider mb-4"></div>
                @php
                    $encrypted_id = Crypt::encrypt($user->id);
                @endphp
                <form action="{{ route('user.update', $encrypted_id) }}" method="POST" class="card-body">
                    @csrf


                    {{-- user name --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="alignment-username" class="form-control"
                                value="{{ old('name', $user->name) }}" />
                        </div>
                    </div>

                    {{-- user email --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" id="alignment-username" class="form-control"
                                value="{{ old('email', $user->email) }}" />
                        </div>
                    </div>

                    {{-- user password --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" id="alignment-password" class="form-control"
                                placeholder="Enter new password or (leave it blank)">
                        </div>
                    </div>


                    {{-- Phone number --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-phone">Phone No.</label>
                        <div class="col-sm-8">
                            <input type="text" name="phone" id="alignment-phone" class="form-control"
                                value="{{ old('phone', $user->phone) }}" />
                        </div>
                    </div>

                    {{-- CNIC --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-CNIC">CNIC</label>
                        <div class="col-sm-8">
                            <input type="text" name="cnic" id="alignment-cnic" class="form-control"
                                value="{{ old('cnic', $user->cnic) }}" />
                        </div>
                    </div>

                    {{-- Gender --}}
                    <div class="row mb-3">
                        <label for="Gender" class="col-sm-2 col-form-label text-sm-end">Gender</label>
                        <div class="col-sm-8">
                            <input type="text" name="gender" id="alignment-gender" class="form-control"
                                value="{{ old('gender', $user->gender) }}" />
                        </div>
                    </div>

                    {{-- Country --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Country</label>
                        <div class="col-sm-8">
                            <input type="text" name="country" id="alignment-country" class="form-control"
                                value="{{ old('country', $user->country) }}" />
                        </div>
                    </div>


                    {{-- Province --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-username">Province</label>
                        <div class="col-sm-8">
                            <input type="text" name="province" id="alignment-province" class="form-control"
                                value="{{ old('province', $user->province) }}" />
                        </div>
                    </div>

                    {{-- District --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-district">District</label>
                        <div class="col-sm-8">
                            <input type="text" name="district" id="alignment-district" class="form-control"
                                value="{{ old('district', $user->district) }}" />
                        </div>
                    </div>

                    {{-- Porfessional --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-address">Professional
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="professional" id="alignment-professional" class="form-control"
                                value="{{ old('professional', $user->professional) }}" />
                        </div>
                    </div>

                    {{-- Address --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-professional">Address
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="address" id="alignment-address" class="form-control"
                                value="{{ old('address', $user->address) }}" />
                        </div>
                    </div>



                    {{-- user role --}}
                    <div class="row mb-3">
                        <label for="defaultSelect" class="col-sm-2 col-form-label text-sm-end">Role</label>
                        <div class="col-sm-8">
                            <select id="defaultSelect" name="roles[]" class="form-select">
                                @foreach ($roles as $value => $label)
                                    <option value="{{ $value }}" {{ isset($userRole[$value]) ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Add user button --}}
                    <hr class="my-1 mx-1">
                    <div class="card-footer col-md-12 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
