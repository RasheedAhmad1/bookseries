@extends('masterLayout.master')
@push('content')
    {{-- <!-- Breadcrumb -->
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
    </div><!--/ Breadcrumb --> --}}

    <!--Form -->
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header col-md-12 d-flex justify-content-between align-items-center">
                    <h5 class="card-header text-primary">New Role</h5>
                </div>
                <hr class="my-4 mx-n4">
                <form action="{{ route('role.store') }}" method="POST" class="card-body" enctype="multipart/form-data">
                    @csrf

                    {{-- Name --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="role">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="alignment-username" class="form-control"
                                placeholder="Enter role name" />
                        </div>
                    </div>

                    {{-- Permissions --}}
                    <div class="row mb-3 col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label><input type="checkbox" name="permission[{{$value->id}}]" value="{{$value->id}}" class="name">
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
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
