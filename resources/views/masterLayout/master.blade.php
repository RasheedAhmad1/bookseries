<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
>
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
              {{-- @yield('content') --}}
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

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Scripts -->
    @include('layouts.scripts')
  </body>
</html>
