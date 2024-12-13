<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">
@include('layouts.head')

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Layout container -->
            <div class="layout-page">

                @include('layouts.nav')

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">


                        <h5 class="py-3 breadcrumb-wrapper mb-4">
                            <span class="text-muted fw-light">
                                <a href="{{ route('books.dashboard') }}"><i class="bx bx-home mr2"></i> Dashboard
                                </a> /
                            </span>

                            @if (isset($current_app))
                                <span class="text-muted fw-light">
                                    <a href="{{ url($current_app->route) }}">
                                        @if (!is_null($current_app->icon))
                                            <i class="bx {{ $current_app->icon }}"></i>
                                        @endif
                                        {{ $current_app->title ?? '' }}
                                    </a>
                                </span>
                            @endif

                            @if (isset($back_route))
                                @if (isset($back_route[2]))
                                    <span class="text-muted fw-light">
                                        <a href="{{ $back_route[0] }}">
                                            {{ $back_route[1] }}
                                        </a> /
                                    </span>
                                @else
                                    <span class="text-muted fw-light">
                                        <a href="{{ route($back_route[0]) }}">
                                            {{ $back_route[1] }}
                                        </a> /
                                    </span>
                                @endif

                            @endif

                            {{ $title ?? '' }}
                        </h5>



                        <div class="row">
                            <div class="col-12">
                                @if (\Illuminate\Support\Facades\Session::has('error'))
                                    <div class="alert alert-solid-danger alert-dismissible" role="alert">
                                        <h6 class="alert-heading mb-1"><i
                                                class="bx bx-xs bx-desktop align-top me-2"></i>Error!</h6>
                                        <span>{{ \Illuminate\Support\Facades\Session::get('error') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (\Illuminate\Support\Facades\Session::has('success'))
                                    <div class="alert alert-solid-success alert-dismissible" role="alert">
                                        <h6 class="alert-heading mb-1"><i
                                                class="bx bx-xs bx-desktop align-top me-2"></i>Success!</h6>
                                        <span>{{ \Illuminate\Support\Facades\Session::get('success') }}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @stack('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    @include('layouts.footer')
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- /Content wrapper -->

            </div>
            <!-- / Layout page -->

        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Scripts -->
    @include('layouts.scripts')
</body>

</html>
