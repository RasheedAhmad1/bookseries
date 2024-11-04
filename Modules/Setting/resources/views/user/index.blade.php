@extends('masterlayout.master')

@push('style')
    <style>
        /* This CSS not working */
        /* .c-mr {
            margin-right: 5px;
        }
        .c-space {
            display: flex;
            justify-content: space-between;
        } */
    </style>
@endpush

@push('content')
<div class="row">
    <div class="col-lg-12 margin-tb" Style="display: flex; justify-content: space-between;">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('user.create') }}">
                <i class="fa fa-plus" style="margin-right: 5px;"></i>
                Create New User
            </a>
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
   <tr>
       <th width="90px">S. No.</th>
       <th>Name</th>
       <th>Email</th>
       <th>Role</th>
       <th>Action</th>
   </tr>
   @foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
               <label class="badge bg-success">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        @php
            $encrypted_id = Crypt::encrypt($user->id);
        @endphp
        <td>
            <a class="btn btn-info btn-sm" href="{{ route('user.show', $encrypted_id) }}">
                <i class="fa-solid fa-list" style="margin-right: 5px;"></i>
                Show
            </a>
            <a class="btn btn-primary btn-sm" href="{{ route('user.edit', $encrypted_id) }}">
                <i class="fa-solid fa-pen-to-square" style="margin-right: 5px;"></i>
                Edit
            </a>
            <form method="POST" action="{{ route('user.destroy', $encrypted_id) }}" style="display:inline">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fa-solid fa-trash" style="margin-right: 5px;"></i>
                    Delete
                </button>
            </form>
        </td>
    </tr>
 @endforeach

</table>

{!! $data->links('pagination::bootstrap-5') !!}

@endpush
