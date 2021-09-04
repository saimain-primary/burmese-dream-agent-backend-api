@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Category</h6>
                <ol class="m-0 breadcrumb">
                    <li class="breadcrumb-item active">Welcome to Veltrix Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3 card-title">Add new category</h3>

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                            <strong>Well done!</strong> {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                            <strong>Oop!</strong> {{ Session::get('fail') }}
                        </div>
                    @endif
                    <form class="custom-validation" action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Group</label>
                            <div class="alert alert-info">
                                <p>
                                    Category Group (1) တွင် Lipstick , Clay Mask , Foundation , Powder , Body Scrub တို့
                                    အုပ်စု
                                    ကိုထည့်ပေးပါ။
                                    <br>
                                    Group (2) တွင် Lip Oil , Lip Scrub နှင့် Remover တို့ အုပ်စုကို ထည့်ပေးပါ။
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="px-3 py-2 border rounded border-primary">
                                    <input type="radio" value="1" name="group" id="group_1"> <label for="group_1">Group
                                        1</label>
                                </div>
                                <div class="px-3 py-2 border rounded border-primary">
                                    <input type="radio" value="2" name="group" id="group_2"> <label for="group_2">Group
                                        2</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Add New
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
