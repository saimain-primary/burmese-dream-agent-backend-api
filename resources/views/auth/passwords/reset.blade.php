@extends('auth.app')

@section('content')
    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('/') }}" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Reset Password !</h5>
                                <p class="text-white-50">Change new password.</p>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Enter email address" name="email"
                                            value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter password" name="password" required
                                            autocomplete="new-password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-confirm">Confirm Password</label>
                                        <input type="password" class="form-control" id="password-confirm"
                                            placeholder="Confirm password" name="password_confirmation" required
                                            autocomplete="new-password">
                                    </div>

                                    <div class="mb-3 d-flex">
                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Reset Password</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="{{ route('register') }}}}" class="fw-medium text-primary">
                                Sign up now
                            </a> </p>
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Make with <i class="mdi mdi-heart text-danger"></i> by
                        justsaimain</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
