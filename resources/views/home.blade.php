@extends('masterLayout.masterHorizontal')

@push('style')
    <style>
        /* Custom CSS goes here */
    </style>
@endpush

@push('content')
      <!-- Examples -->
      <div class="row mb-5">
        <div class="col-lg-3 col-md-6 col-md-12 mb-4">
            <a href="books" class="btn">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Books</h5>
                        <p class="card-text">Books library</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endpush