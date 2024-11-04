@extends('masterlayout.master')

{{-- @push('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Role Management</h2>
            </div>
            <div class="pull-right">
            @can('role-create')
                <a class="btn btn-success btn-sm mb-2" href="{{ route('role.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
                @endcan
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
        <th width="100px">S. No.</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('role.show',$role->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                @can('role-edit')
                    <a class="btn btn-primary btn-sm" href="{{ route('role.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                @endcan

                @can('role-delete')
                <form method="POST" action="{{ route('role.destroy', $role->id) }}" style="display:inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </table>

    {!! $roles->links('pagination::bootstrap-5') !!}
@endpush --}}

@push('conten')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-2">Roles List</h4>

        <p>
            A role provided access to predefined menus and features so that depending on <br />
            assigned role an administrator can have access to what user needs.
        </p>
        <!-- Role cards -->
        <div class="row g-4">
            <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h6 class="fw-normal">Total 4 users</h6>
                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Vinnie Mostowy"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Allen Rieske"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Julee Rossignol"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Kaith D'souza"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/15.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="John Doe"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar" />
                    </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="role-heading">
                    <h4 class="mb-1">Administrator</h4>
                    <a
                        href="javascript:;"
                        data-bs-toggle="modal"
                        data-bs-target="#addRoleModal"
                        class="role-edit-modal"
                        ><small>Edit Role</small></a
                    >
                    </div>
                    <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h6 class="fw-normal">Total 7 users</h6>
                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Jimmy Ressula"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/4.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="John Doe"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/1.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Kristi Lawker"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/2.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Kaith D'souza"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/15.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Danny Paul"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/7.png" alt="Avatar" />
                    </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="role-heading">
                    <h4 class="mb-1">Manager</h4>
                    <a
                        href="javascript:;"
                        data-bs-toggle="modal"
                        data-bs-target="#addRoleModal"
                        class="role-edit-modal"
                        ><small>Edit Role</small></a
                    >
                    </div>
                    <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h6 class="fw-normal">Total 5 users</h6>
                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Andrew Tye"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Rishi Swaat"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Rossie Kim"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Kim Merchent"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Sam D'souza"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/13.png" alt="Avatar" />
                    </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="role-heading">
                    <h4 class="mb-1">Users</h4>
                    <a
                        href="javascript:;"
                        data-bs-toggle="modal"
                        data-bs-target="#addRoleModal"
                        class="role-edit-modal"
                        ><small>Edit Role</small></a
                    >
                    </div>
                    <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h6 class="fw-normal">Total 3 users</h6>
                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Kim Karlos"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/3.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Katy Turner"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Peter Adward"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/15.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Kaith D'souza"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="John Parker"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/11.png" alt="Avatar" />
                    </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="role-heading">
                    <h4 class="mb-1">Support</h4>
                    <a
                        href="javascript:;"
                        data-bs-toggle="modal"
                        data-bs-target="#addRoleModal"
                        class="role-edit-modal"
                        ><small>Edit Role</small></a
                    >
                    </div>
                    <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h6 class="fw-normal">Total 2 users</h6>
                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Kim Merchent"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Sam D'souza"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/13.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Nurvi Karlos"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/15.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Andrew Tye"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/8.png" alt="Avatar" />
                    </li>
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        title="Rossie Kim"
                        class="avatar avatar-sm pull-up"
                    >
                        <img class="rounded-circle" src="../../assets/img/avatars/9.png" alt="Avatar" />
                    </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="role-heading">
                    <h4 class="mb-1">Restricted User</h4>
                    <a
                        href="javascript:;"
                        data-bs-toggle="modal"
                        data-bs-target="#addRoleModal"
                        class="role-edit-modal"
                        ><small>Edit Role</small></a
                    >
                    </div>
                    <a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>
                </div>
                </div>
            </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                <div class="col-sm-5">
                    <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                    <img
                        src="../../assets/img/illustrations/lady-with-laptop-light.png"
                        class="img-fluid"
                        alt="Image"
                        width="100"
                        data-app-light-img="illustrations/lady-with-laptop-light.png"
                        data-app-dark-img="illustrations/lady-with-laptop-dark.png"
                    />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="card-body text-sm-end text-center ps-sm-0">
                    <button
                        data-bs-target="#addRoleModal"
                        data-bs-toggle="modal"
                        class="btn btn-primary mb-3 text-nowrap add-new-role"
                    >
                        Add New Role
                    </button>
                    <p class="mb-0">Add role, if it does not exist</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-12">
            <!-- Role Table -->
            <div class="card">
                <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top">
                    <thead>
                    <tr>
                        <th></th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Plan</th>
                        <th>Billing</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                </table>
                </div>
            </div>
            <!--/ Role Table -->
            </div>
        </div>
        <!--/ Role cards -->

        <!-- Add Role Modal -->
        <!-- Add Role Modal -->
        <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button
                type="button"
                class="btn-close btn-pinned"
                data-bs-dismiss="modal"
                aria-label="Close"
                ></button>
                <div class="modal-body">
                <div class="text-center mb-4">
                    <h3 class="role-title">Add New Role</h3>
                    <p>Set role permissions</p>
                </div>
                <!-- Add role form -->
                <form id="addRoleForm" class="row g-3" onsubmit="return false">
                    <div class="col-12 mb-4">
                    <label class="form-label" for="modalRoleName">Role Name</label>
                    <input
                        type="text"
                        id="modalRoleName"
                        name="modalRoleName"
                        class="form-control"
                        placeholder="Enter a role name"
                        tabindex="-1"
                    />
                    </div>
                    <div class="col-12">
                    <h5>Role Permissions</h5>
                    <!-- Permission table -->
                    <div class="table-responsive">
                        <table class="table table-flush-spacing">
                        <tbody>
                            <tr>
                            <td class="text-nowrap">
                                Administrator Access
                                <i
                                class="bx bx-info-circle bx-xs"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Allows a full access to the system"
                                ></i>
                            </td>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                <label class="form-check-label" for="selectAll"> Select All </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td class="text-nowrap">User Management</td>
                            <td>
                                <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                    <label class="form-check-label" for="userManagementRead"> Read </label>
                                </div>
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="userManagementWrite" />
                                    <label class="form-check-label" for="userManagementWrite"> Write </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="userManagementCreate" />
                                    <label class="form-check-label" for="userManagementCreate"> Create </label>
                                </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td class="text-nowrap">Content Management</td>
                            <td>
                                <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="contentManagementRead" />
                                    <label class="form-check-label" for="contentManagementRead"> Read </label>
                                </div>
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="contentManagementWrite" />
                                    <label class="form-check-label" for="contentManagementWrite"> Write </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="contentManagementCreate" />
                                    <label class="form-check-label" for="contentManagementCreate"> Create </label>
                                </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td class="text-nowrap">Disputes Management</td>
                            <td>
                                <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="dispManagementRead" />
                                    <label class="form-check-label" for="dispManagementRead"> Read </label>
                                </div>
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="dispManagementWrite" />
                                    <label class="form-check-label" for="dispManagementWrite"> Write </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dispManagementCreate" />
                                    <label class="form-check-label" for="dispManagementCreate"> Create </label>
                                </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td class="text-nowrap">Database Management</td>
                            <td>
                                <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="dbManagementRead" />
                                    <label class="form-check-label" for="dbManagementRead"> Read </label>
                                </div>
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="dbManagementWrite" />
                                    <label class="form-check-label" for="dbManagementWrite"> Write </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="dbManagementCreate" />
                                    <label class="form-check-label" for="dbManagementCreate"> Create </label>
                                </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td class="text-nowrap">Financial Management</td>
                            <td>
                                <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="finManagementRead" />
                                    <label class="form-check-label" for="finManagementRead"> Read </label>
                                </div>
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="finManagementWrite" />
                                    <label class="form-check-label" for="finManagementWrite"> Write </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="finManagementCreate" />
                                    <label class="form-check-label" for="finManagementCreate"> Create </label>
                                </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td class="text-nowrap">Reporting</td>
                            <td>
                                <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="reportingRead" />
                                    <label class="form-check-label" for="reportingRead"> Read </label>
                                </div>
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="reportingWrite" />
                                    <label class="form-check-label" for="reportingWrite"> Write </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="reportingCreate" />
                                    <label class="form-check-label" for="reportingCreate"> Create </label>
                                </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td class="text-nowrap">API Control</td>
                            <td>
                                <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="apiRead" />
                                    <label class="form-check-label" for="apiRead"> Read </label>
                                </div>
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="apiWrite" />
                                    <label class="form-check-label" for="apiWrite"> Write </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="apiCreate" />
                                    <label class="form-check-label" for="apiCreate"> Create </label>
                                </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td class="text-nowrap">Repository Management</td>
                            <td>
                                <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="repoRead" />
                                    <label class="form-check-label" for="repoRead"> Read </label>
                                </div>
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="repoWrite" />
                                    <label class="form-check-label" for="repoWrite"> Write </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="repoCreate" />
                                    <label class="form-check-label" for="repoCreate"> Create </label>
                                </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <td class="text-nowrap">Payroll</td>
                            <td>
                                <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="payrollRead" />
                                    <label class="form-check-label" for="payrollRead"> Read </label>
                                </div>
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" type="checkbox" id="payrollWrite" />
                                    <label class="form-check-label" for="payrollWrite"> Write </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="payrollCreate" />
                                    <label class="form-check-label" for="payrollCreate"> Create </label>
                                </div>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <!-- Permission table -->
                    </div>
                    <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <button
                        type="reset"
                        class="btn btn-label-secondary"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    >
                        Cancel
                    </button>
                    </div>
                </form>
                <!--/ Add role form -->
                </div>
            </div>
            </div>
        </div>
        <!--/ Add Role Modal -->

        <!-- / Add Role Modal -->
        </div>
        <!--/ Content -->
@endpush
