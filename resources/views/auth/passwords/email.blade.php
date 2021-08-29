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
                                <h5 class="text-white font-size-20 p-2">Reset Password</h5>
                            </div>
                        </div>

                        <div class="card-body p-4">

                            <div class="p-3">

                                <div class="alert alert-success" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>


                                <form class=" mt-4" action="{{ route('password.email') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label" for="useremail">Email</label>
                                        <input type="email" class="form-control" name="email" id="useremail"
                                            placeholder="Enter email">
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="row  mb-0">
                                        <div class="col-12 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Reset</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
                        <p>Remember It ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Sign In here </a>
                        </p>
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                        Themesbrand</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
