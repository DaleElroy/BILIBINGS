@extends('backend.layouts.app')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add User Data</h4>
                        <a href="{{ url('adminusers') }}" class="btn btn-primary float-end ">Back</a>
                        <div class="card-body">

                            <form action="{{url('adminusers')}}" method = "POST">
                                @csrf
                            
                                <h4>Create User</h4>
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <button type = "submit" class="btn btn-primary ">save</button>
                                    </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>