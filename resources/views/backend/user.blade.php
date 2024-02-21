@extends('backend.layouts.app')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            @if (session('message'))
                <h4 class="alert alert-success">{{ session('message') }}</h4>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Users list
                        <a href="{{ url('adminusers/create') }}" class="btn btn-primary float-end">Add User</a>
                    </h4>
                    <div class="card-body">
                        <h5>Total Users: {{ $userCount }}</h5> 
                        <table class="table table-boarded table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Role</th>

                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->isAdmin }}</td>

                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>
                                            <a href="{{ url('adminusers/' . $user->id) . '/edit' }}"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <form action="{{ url('adminusers/' . $user->id) }}" method= "POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
