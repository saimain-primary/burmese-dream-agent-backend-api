@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="mt-3">
                    <a href="{{ route('admin.user.excel.export') }}" class="btn btn-primary">Export to Excel</a>
                    <button data-bs-toggle="modal" data-bs-target="#importExcelForm" class="btn btn-success">Import from
                        Excel</button>
                    <div class="modal fade" id="importExcelForm" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Import from Excel
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.user.excel.import') }}" method="POST"
                                        enctype="multipart/form-data" id="uploadExcelForm">
                                        @csrf
                                        <p>Upload Excel File to import agent data.</p>
                                        <p>Excel format and field must be the same with <a
                                                href="https://i.ibb.co/xmx97qk/Capture.png" target="_blank"
                                                class="text-danger">this example</a>.</p>
                                        <input type="file" value="" name="file">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" form="uploadExcelForm" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3 card-title">Create Agent Account</h3>

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
                    <form class="custom-validation" action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" required name="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" required name="phone" placeholder="Phone Number">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" required name="password" placeholder="Password">
                        </div>
                        <p class="text-muted font-size-13">
                            အေးဂျင့် အကောင့်ဖွင့်ရန်အတွက် အောက်ပါများကိုသာ ဖြည့်ပေးရန်လိုအပ်ပါသည်။
                            <br> ကျန်သော အချက်အလက်များကို အေးဂျင့် ကိုယ်တိုင် ပြန်ဖြည့်နိုင်သည်။
                        </p>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered user-data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Agent ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var i = 1;
            $('.user-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/admin/user/datatable/ssd",
                columns: [{
                        "render": function() {
                            return i++;
                        }
                    }, {
                        data: "agent_id",
                        name: "agent_id"
                    },
                    {
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "email",
                        name: "email"
                    },
                    {
                        data: "created_at",
                        name: "created_at"
                    },
                    {
                        data: "updated_at",
                        name: "updated_at"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection
