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
                                <h5 class="text-white font-size-20">Welcome !</h5>
                                <p class="text-white-50">Sign up for new account.</p>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" class="form-control" name="name" required id="name"
                                            placeholder="Enter name">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" required id="email"
                                            placeholder="Enter email address" name="email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter password" required name="password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" placeholder="Confirm password" required
                                            autocomplete="new-password">
                                    </div>

                                    <div class="mb-3">
                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Sign
                                                Up</button>
                                        </div>
                                    </div>


                                    <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <p class="mb-0">By registering you agree to the Veltrix <a href="#"
                                                    class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Login
                            </a>
                        </p>
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
