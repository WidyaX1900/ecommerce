@extends('templates.layout');
@extends('templates.navbar');
@section('content')
    <section class="container mt-5 pt-5">
        @if (session('message'))
            <div id="flashAlert" class="col-6 text-center alert alert-success mx-auto flash-alert" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <h4 class="mb-3">Create your own store</h4>
                <form action="/store/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="storeLogo" id="storeLogo" hidden>
                    <div class="mb-3">
                        <label for="name" class="form-label">Store Name</label>
                        <input type="text" class="form-control" name="store_name" id="name"
                            placeholder="Enter store name..." value="{{ old('store_name') }}">
                        @error('store_name')
                            <small class="text-danger fst-italic">
                                <i class="fa-solid fa-circle-exclamation me-1"></i>
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Store Email</label>
                        <input type="text" class="form-control" name="store_email" id="email"
                            value="{{ old('store_email') }}" placeholder="Enter store email...">
                        @error('store_email')
                            <small class="text-danger fst-italic">
                                <i class="fa-solid fa-circle-exclamation me-1"></i>
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Store Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"
                            placeholder="Enter store description...">{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger fst-italic">
                                <i class="fa-solid fa-circle-exclamation me-1"></i>
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-black py-3 px-4">
                        <i class="fa-solid fa-circle-plus me-1"></i>
                        Create Store
                    </button>
                </form>
            </div>
            <div class="col-6 text-center">
                <img src="{{ config('app.asset_url') }}img/store-default.png" alt="store-icon" id="storeProfile"
                    class="rounded-circle">
                <button type="button" id="changeLogoBtn" class="btn btn-outline-primary d-block mx-auto mt-3">
                    Upload Logo
                </button>
                @error('storeLogo')
                    <div class="mb-3">
                        <small class="text-danger fst-italic">
                            <i class="fa-solid fa-circle-exclamation me-1"></i>
                            {{ $message }}
                        </small>
                    </div>
                @enderror
            </div>
        </div>
    </section>

    <script>
        const flashAlert = document.getElementById("flashAlert");

        setTimeout(() => {
            flashAlert.remove();
        }, 4000);
    </script>
@endsection
