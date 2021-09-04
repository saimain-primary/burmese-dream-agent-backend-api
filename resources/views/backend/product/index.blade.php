@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered product-data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Price</th>
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
            $('.product-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/admin/products/datatable/ssd",
                columns: [{
                        "render": function() {
                            return i++;
                        }
                    },
                    {
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "category",
                        name: "category"
                    },
                    {
                        data: "description",
                        name: "description"
                    },
                    {
                        data: "price",
                        name: "price"
                    },
                    {
                        data: "created_at",
                        name: "created_at"
                    }, {
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
