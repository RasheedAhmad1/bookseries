@extends('masterLayout.masterHorizontal')

@push('style')
    <style>
        /* Custom CSS goes here */
    </style>
@endpush
@push('content')
    <div class="row m-5">
        <!-- Setting Module -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
            <a href="/setting">
                <div class="card border-bottom border-primary">
                    <div class="card-header pb-2">
                        <h3 class="card-title text-center mt-3 text-primary">SETTINGS</h3>
                    </div>
                    <div class="card-body pb-2">
                        <div class="d-flex justify-content-center align-items-center gap-3">
                            <div class="d-flex align-content-center">
                                <small class="text-muted">This is a setting module of book-series project</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                            <div class="d-flex align-content-center">
                                <small class="text-muted">Click box to go to setting module</small>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!--/ Setting Module -->
        <!-- Book Module -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
            <a href="/book/dashboard">
                <div class="card border-bottom border-primary">
                    <div class="card-header pb-2">
                        <h3 class="card-title text-center mt-3 text-primary">BOOKS</h3>
                    </div>
                    <div class="card-body pb-2">
                        <div class="d-flex justify-content-center align-items-center gap-3">
                            <div class="d-flex align-content-center">
                                <small class="text-muted">This is a book module of book-series project</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                            <div class="d-flex align-content-center">
                                <small class="text-muted">Click box to go to book module</small>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!--/ Book Module -->

    </div>
@endpush
