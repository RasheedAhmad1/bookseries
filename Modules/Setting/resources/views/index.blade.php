@extends('masterlayout.master')

@push('content')
    <div class="row">
        <!-- Basic Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href={{ route('home') }}>Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('settings') }}">Setting</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!--/ Basic Breadcrumb -->

    <!-- Cards -->
    <div class="row gy-4" id="sortable-4">
        <div class="col-md-6 col-xl-4">
            <div class="card bg-primary text-white">
                <div class="card-header cursor-move">Drag me not!</div>
                <div class="card-body">
                    <h4 class="card-title text-white">Primary card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-secondary text-white">
                <div class="card-header cursor-move">Drag me!</div>
                <div class="card-body">
                    <h4 class="card-title text-white">Secondary card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-success text-white">
                <div class="card-header cursor-move">Drag me!</div>
                <div class="card-body">
                    <h4 class="card-title text-white">Success card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-danger text-white">
                <div class="card-header cursor-move">Drag me!</div>
                <div class="card-body">
                    <h4 class="card-title text-white">Danger card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-warning text-white">
                <div class="card-header cursor-move">Drag me!</div>
                <div class="card-body">
                    <h4 class="card-title text-white">Warning card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-info text-white">
                <div class="card-header cursor-move">Drag me!</div>
                <div class="card-body">
                    <h4 class="card-title text-white">Info card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up.</p>
                </div>
            </div>
        </div>
    </div><!--/ Cards -->
@endpush
