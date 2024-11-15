@extends('masterLayout.master')

@push('content')
    <!-- Breadcrumb -->
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
                        <li class="breadcrumb-item active link-primary" aria-current="page">{{ $breadcrumb['name'] }}</li>
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
                    <h5 class="card-header text-primary">Edit Role</h5>
                </div>
                <hr class="my-1 mx-1">
                <form action="{{ route('role.update', $role->id) }}" method="POST" class="card-body"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Name --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-sm-end" for="alignment-rolename">Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="alignment-rolename" class="form-control"
                                value="{{ old('name', $role->name) }}" />
                        </div>
                    </div>

                    {{-- Permission --}}
                    <div class="row mb-3 col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permission as $value)
                                <label><input type="checkbox" name="permission[{{ $value->id }}]" value="{{ $value->id }}" class="name" {{ in_array($value->id, $rolePermissions) ? 'checked' : ''}}>
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
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
