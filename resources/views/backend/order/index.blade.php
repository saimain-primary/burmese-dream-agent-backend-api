@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Dashboard</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Welcome to Veltrix Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered order-data-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Order ID</th>
                                <th>Payment</th>
                                <th>Time</th>
                                <th>Date</th>
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
            $('.order-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "/admin/orders/today/datatable/ssd",
                columns: [{
                        "render": function() {
                            return i++;
                        }
                    }, {
                        data: "order_id",
                        name: "order_id"
                    },
                    {
                        data: "payment",
                        name: "payment"
                    },
                    {
                        data: "time",
                        name: "time"
                    },
                    {
                        data: "date",
                        name: "date"
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
