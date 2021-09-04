@extends('backend.layouts.app')
@section('content')
    <!-- start page title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Product</h6>
                <ol class="m-0 breadcrumb">
                    <li class="breadcrumb-item active">Welcome to Veltrix Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3 card-title">Add new product</h3>
                    <form class="custom-validation" action="{{ route('admin.products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name <span class="text-danger">
                                            *</span></label>
                                    <input type="text" class="form-control" required name="name" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="category_id">Category <span class="text-danger">
                                            *</span></label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        @php
                                            $categories = \App\Models\Category::all();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="price">Retail Price (MMK) <span
                                            class="text-danger">
                                            *</span></label>
                                    <input type="text" class="form-control" id="price" name="price"
                                        placeholder="Retail Price">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="weight">Weight</label>
                                    <input type="text" class="form-control" id="weight" name="weight"
                                        placeholder="Product Weight">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="images">Images <span class="text-danger">
                                            *</span></label>
                                    <input type="file" multiple class="form-control" id="images" required name="images[]">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Wholesale Prices <span class="text-danger">
                                            *</span></label>
                                    <table class="table table-bordered" id="dynamicAddRemove">
                                        <tr>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td><input type="number" name="wholesale[0][qty]" placeholder="Enter Qty"
                                                    class="form-control" />
                                            </td>
                                            <td><input type="number" name="wholesale[0][price]" placeholder="Enter Price"
                                                    class="form-control" />
                                            </td>
                                            <td><button type="button" name="add" id="dynamic-ar"
                                                    class="btn btn-outline-primary">Add Price</button></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Description <span
                                            class="text-danger">
                                            *</span></label>
                                    <textarea class="form-control" name="description" id="description" cols="30"
                                        rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="how_to_use">How To Use</label>
                                    <textarea class="form-control" name="how_to_use" id="how_to_use" cols="30"
                                        rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Features</label>
                                    <textarea class="form-control" name="features" id="features" cols="30"
                                        rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ingredients</label>
                                    <textarea class="form-control" name="ingredients" id="ingredients" cols="30"
                                        rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="my-3 text-center col-md-12">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><input type="number" name="wholesale[' + i +
                '][qty]" placeholder="Enter Qty" class="form-control" /></td><td><input type="number" name="wholesale[' +
                i +
                '][price]" placeholder="Enter Price" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
        });
        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
