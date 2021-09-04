@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">View</h6>
                <ol class="m-0 breadcrumb">
                    <ol class="m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Veltrix</a></li>
                        <li class="breadcrumb-item"><a href="#">Extra Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Starter Page</li>
                    </ol>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-4">
            <div class="card directory-card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="@if ($user->profile == null) https://ui-avatars.com/api/?background=ccc&name={{ $user->name }} @else {{ $user->profile }} @endif" alt=""
                                class="img-fluid img-thumbnail rounded-circle avatar-lg">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="mb-1 text-primary font-size-18">{{ $user->name }} ({{ $user->agent_id }})</h5>
                            <p class="mb-2 font-size-15"><span
                                    class="badge bg-primary">{{ $user->group_one_level }}</span><span
                                    class="mx-1 badge bg-danger">{{ $user->group_two_level }}</span></p>
                            <p class="mb-0 font-size-14"><i class="mx-1 ti-email"></i> {{ $user->email }}</p>
                            <p class="mb-0 font-size-14"><i class="mx-1 ti-mobile"></i> {{ $user->phone }}</p>
                        </div>
                        <ul class="list-unstyled social-links ms-auto">
                            <li><a href="{{ $user->facebook }}" target="_blank" class="btn-primary"><i
                                        class="mdi mdi-facebook"></i></a></li>
                        </ul>
                    </div>
                    <hr>
                    <p class="mb-0"><b>Intro : </b>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                        blanditiis atque corrupti quos dolores et... <a href="#" class="text-primary"> Read More</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
