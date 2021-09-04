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
            <div class="col-md-4">
                <div class="float-end d-none d-md-block">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i
                            class="ti-pencil"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-primary">{{ $product->name }}</h5>
                            <a href="#" class="text-primary">{{ $product->category->name }}</a>
                            <p>{{ $product->price }} MMK / {{ $product->weight }}</p>
                            <dl class="row mb-0">
                                <dt class="col-sm-3">Description</dt>
                                <dd class="col-sm-9">
                                    @php
                                        echo nl2br($product->description);
                                    @endphp
                                </dd>

                                <dt class="col-sm-3">How To Use</dt>
                                <dd class="col-sm-9">
                                    @php
                                        echo nl2br($product->how_to_use);
                                    @endphp
                                </dd>

                                <dt class="col-sm-3">Features</dt>
                                <dd class="col-sm-9">
                                    @php
                                        echo nl2br($product->features);
                                    @endphp
                                </dd>

                                <dt class="col-sm-3">Ingredients</dt>
                                <dd class="col-sm-9">
                                    @php
                                        echo nl2br($product->ingredients);
                                    @endphp
                                </dd>
                            </dl>
                        </div>

                        <div class="col-md-6">
                            @php
                                $ws = json_decode($product->wholesale);
                            @endphp
                            <h4 class="card-title mb-4">Wholesale Prices</h4>
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
                            <div>
                                <h4 class="card-title">Products Images</h4>
                                <p class="card-title-desc">In this example lazy-loading of images is enabled for the next
                                    image
                                    based on
                                    move direction. </p>
                                @php
                                    $images = json_decode($product->images);
                                @endphp
                                <div class="popup-gallery">
                                    @foreach ($images as $image)
                                        <a class="float-start"
                                            href="{{ Storage::disk('ln_spaces')->url('BurmeseDream/Products/Images/' . $image) }}"
                                            title="{{ $product->name }}">
                                            <div class="img-responsive">
                                                <img src="{{ Storage::disk('ln_spaces')->url('BurmeseDream/Products/Images/' . $image) }}"
                                                    alt="" width="120">
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
