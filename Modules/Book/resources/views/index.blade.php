@extends('masterlayout.master')

@push('content')
    <!-- Dynamic Breadcrumb -->
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$loop->last)
                        <!-- Linkes for items-->
                        <li class="breadcrumb-item">
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
    <!-- Draggable Cards -->
    <div class="row gy-4" id="sortable-4">
        <div class="col-md-6 col-xl-4">
            <div class="card bg-primary text-white">
                <div class="card-header cursor-move">Drag me!</div>
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
    </div>
    <!--/ Draggable Cards -->
@endpush
