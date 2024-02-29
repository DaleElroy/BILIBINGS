@extends('backend.layouts.app')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit the Users Details</h4>
                    <a href="{{url('adminusers/')}}" class="btn btn-primary float-end">Back</a>
                    
                    <div class="card-body">
                        <form action="{{url('adminusers/'.$user->id)}}" method ="POST">
                        @csrf
                        @method('PUT')

                        <h2>User</h2>
                        <div class="mb-3">
                            <label>User Id</label>
                            <h6 class="form-control">ID No.{{$user->id}}</h6>
                        </div>
                        <div class="mb-3">
                            <h4>User Name</h4>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                        <div class="mb-3">
                            <h4>User Email</h4>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}">
                        </div>








                        <h2>User Details</h2>
                        <div class="mb-3">
                            <h4>User Phone No.</h4>
                            <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                        </div>

                        <div class="mb-3">
                            <h4>User Address</h4>
                            <input type="text" name="address" class="form-control" value="{{$user->address}}">
                        </div>






                        <div class="mb-3">
                            <h4>User Gender</h4>
                            <input type="text" name="address" class="form-control" value="{{$user->gender}}">
                        </div>

                        <div class="mb-3">
                            <h4>User Address</h4>
                            <input type="text" name="address" class="form-control" value="{{$user->address}}">
                        </div>
                        <div class="mb-3">
                            <h4>User Contact No.</h4>
                            <input type="text" name="address" class="form-control" value="{{$user->phone}}">
                        </div>

                        <div class="mb-3">
                            <button type="submit " class="btn btn-primary ">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>