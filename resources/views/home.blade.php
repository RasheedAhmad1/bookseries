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
            <a href="/settings">
                <div class="card border-bottom border-primary">
                    <div class="card-header pb-2">
                        <h3 class="card-title text-center mt-3 text-primary">Setting</h3>
                    </div>
                    <div class="card-body pb-2">
                        <div class="d-flex justify-content-center align-items-center gap-3">
                            <div class="d-flex align-content-center">
                                <small class="text-muted">Settings module</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                            <div class="d-flex align-content-center">
                                <small class="text-muted">Click box to go to settings</small>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div><!--/ Setting Module -->

        <!-- Book Module -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
            <a href="/book/dashboard">
                <div class="card border-bottom border-primary">
                    <div class="card-header pb-2">
                        <h3 class="card-title text-center mt-3 text-primary">Books</h3>
                    </div>
                    <div class="card-body pb-2">
                        <div class="d-flex justify-content-center align-items-center gap-3">
                            <div class="d-flex align-content-center">
                                <small class="text-muted">Books module</small>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                            <div class="d-flex align-content-center">
                                <small class="text-muted">Click box to go to books</small>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div><!--/ Book Module -->

    </div>
@endpush
