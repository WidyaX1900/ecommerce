@extends('templates.layout')
@extends('templates.navbar')

<div class="row">
    @extends('templates.sidebar')
    @section('admin')
        <div class="col-12 admin-content">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Subscribers</h5>
                <button type="button" class="col-3 btn btn-primary d-block rounded me-5 py-2">
                    <i class="fa-solid fa-envelope me-1"></i>
                    Email All
                </button>
            </div>
            <table class="table mt-3">
                <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @foreach ($subscribers as $subscriber)
                    <tr class="subscriber-list">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img src="{{ asset('img/user.png') }}" alt="">
                        </td>
                        <td>{{ $subscriber['name'] }}</td>
                        <td>{{ $subscriber['email'] }}</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm">
                                <i class="fa-solid fa-envelope me-1"></i>
                                Email
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endsection
</div>
