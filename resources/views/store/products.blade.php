@extends('templates.layout')
@extends('templates.navbar')

<div class="row">
    @extends('templates.sidebar')
    @section('admin')
        <div class="col-12 admin-content">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Products</h5>
                <a href="#" class="col-3 btn btn-black d-block rounded me-5 py-2">
                    <i class="fa-solid fa-circle-plus me-1"></i>
                    New Product
                </a>
            </div>
            <table class="table mt-3">
                <tr>
                    <th>No</th>
                    <th>Product ID</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                @foreach ($products as $product)
                    <tr class="index-transaction">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product['product_id'] }}</td>
                        <td>
                            <img src="{{ asset('img/book-covers/' . $product['cover']) }}" alt="product-cover">
                        </td>
                        <td>{{ $product['title'] }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary me-2">
                                See Detail
                            </a>
                            <a href="#" class="btn btn-sm btn-warning me-2">
                                Edit
                            </a>
                            <button type="button" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
</div>
