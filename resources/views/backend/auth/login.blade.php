@extends('backend.auth.app')
@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue to Dashboard.</p>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" action="{{ route('admin.login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Enter email address"
                                            name="email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Enter password" name="password">
                                    </div>

                                    <div class="mb-3">
                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log
                                                In</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="mt-5 text-center">
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
