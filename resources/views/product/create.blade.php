@extends('templates.layout')
@extends('templates.navbar')

<div class="row">
    @extends('templates.sidebar')
    @section('admin')
        <div class="col-12 admin-content overflow-x-hidden">
            @php
                echo session('message');
            @endphp
            <div class="row">
                <div class="col-11">
                    <h4 class="mb-3">Add New Product</h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="productPhotos" id="productPhotos">
                        <input type="file" id="productFile" hidden accept="image/*" multiple>
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Product name...">
                            @error('name')
                                <small class="text-danger fst-italic">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cost" class="form-label">Cost</label>
                            <input type="number" class="form-control" name="cost" id="cost" placeholder="Cost...">
                            @error('cost')
                                <small class="text-danger fst-italic">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Product description..."></textarea>
                            @error('description')
                                <small class="text-danger fst-italic">
                                    <i class="fa-solid fa-circle-exclamation me-1"></i>
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photoUploader" class="form-label">
                                Upload Product Photo
                                <strong>(max upload 5 photos)</strong>
                            </label>
                            <div class="product-photo-uploader">
                                <div id="photoUpload" class="upload-icon">
                                    <i class="fa-solid fa-image"></i>
                                    <strong>Click here to upload a picture</strong>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-black py-3 px-4" data-bs-toggle="modal"
                            data-bs-target="#previewModal">
                            <i class="fa-solid fa-circle-plus me-1"></i>
                            Add Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</div>

<!-- Modal -->
<div class="modal fade" id="previewModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="image-preview">
                    <img id="imagePreview" src="{{ asset('img/book-covers/bodo-amat.jpeg') }}" alt="product-photos"
                        class="img-vertical">
                </div>
                <div class="image-list">
                    <div class="list-box">
                        <img src="{{ asset('img/book-covers/bodo-amat.jpeg') }}" alt="cover-list" class="img-fluid">
                        <button type="button" class="btn btn-danger remove-img-btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
