<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
>
@include('layouts.head')

  <body>
    <!-- Content -->
    <div class="authentication-wrapper authentication-cover">
      <div class="authentication-inner row m-0">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
          <div class="flex-row text-center mx-auto">
            <img
              src="{{ asset('assets/img/branding/logo-full.png') }}"
              alt="Book Series"
              width="520"
            />
            {{-- <div class="mx-auto">
              <h3>Discover the powerful admin template 🥳</h3>
              <p>
                Perfectly suited for all level of developers which helps you to <br />
                kick start your next big projects & Applications.
              </p>
            </div> --}}
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
          <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-4">
              <a href="index.html" class="app-brand-link gap-2 mb-2">
                <span class="app-brand-logo demo">
                  <img
                    src="{{ asset('assets/img/branding/logo-full.png') }}"
                    alt="Book Series"
                    width="70"
                    height="60"
                  />
                </span>
                <span class="app-brand-text demo h2 mb-0 fw-bold">Book Series | Login</span>
              </a>
            </div>
            <!-- /Logo -->
            {{-- <h4 class="mb-2">Welcome to Frest! 👋</h4>
            <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

            {{-- Login form --}}
            <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Email or Username</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  :value="old('email')"
                  placeholder="Enter your email or username"
                  required autofocus autocomplete="username"
                  />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="auth-forgot-password-cover.html">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                    required autocomplete="current-password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
            </form>

            {{-- Registeration link --}}
            <p class="text-center">
              <span>New to Book Series?</span>
              <a href="{{ route('register') }}">
                <span>Create an account</span>
              </a>
            </p>

            <div class="divider my-4">
              <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center">
              <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                <i class="tf-icons bx bxl-facebook"></i>
              </a>

              <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                <i class="tf-icons bx bxl-google-plus"></i>
              </a>

              <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                <i class="tf-icons bx bxl-twitter"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    @include('layouts.scripts')
  </body>
</html>
