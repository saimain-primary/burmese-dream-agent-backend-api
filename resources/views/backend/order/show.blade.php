@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Order Details</h6>
                <ol class="m-0 breadcrumb">
                    <ol class="m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
                        <li class="breadcrumb-item"><a>#{{ $order->order_id }}</a></li>
                    </ol>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @php
                        $orders = json_decode($order->order);
                    @endphp
                    <table class="table table-bordered">
                        <thead>
                            <th>No.</th>
                            <th>Code</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Package</th>
                            <th>Qty</th>
                            <th>Retail Price</th>
                            <th>Wholesale Prices</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @php
                                    $product = App\Models\Product::find($order->product_id);
                                @endphp
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $product->code }}</td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->category->name }}
                                    </td>
                                    <td><span class="badge bg-primary">{{ $product->category->group }}</span></td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target=".wholesale-modal-{{ $product->id }}">Wholesale</button>
                                        <div class="modal fade wholesale-modal-{{ $product->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        @php
                                                            $ws = json_decode($product->wholesale);
                                                        @endphp
                                                        <table class="table table-bordered table-striped table-hover">
                                                            <thead>
                                                                <th>No.</th>
                                                                <th>Buying Qty</th>
                                                                <th>Wholesale Price</th>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($ws as $w)
                                                                    <tr>
                                                                        <td>{{ $loop->index + 1 }}</td>
                                                                        <td>{{ $w->qty }}</td>
                                                                        <td>{{ $w->price }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
