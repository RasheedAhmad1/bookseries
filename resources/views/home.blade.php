@extends('masterLayout.masterHorizontal')

@push('style')
    <style>
        /* Custom CSS goes here */
    </style>
@endpush

@push('content')
    <!-- Modules -->
    <div class="row mb-5">
        <!-- Book Module -->
        <div class="col-md-6 col-xl-4">
            <a href="books">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Book</h5>
                        <p class="card-text">Books Library</p>
                    </div>
                </div>
            </a>
        </div> <!--/ Book Module -->

        <!-- Setting Module -->
        <div class="col-md-6 col-xl-4">
            <a href="setting">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Setting</h5>
                        <p class="card-text">Get settings</p>
                    </div>
                </div>
            </a>
        </div> <!--/ Setting Module -->
    </div> <!--/ Modules -->
@endpush