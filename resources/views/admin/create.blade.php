@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <form id="loginFormValidation" action="{{ route('create_admin') }}" method="post">
                        {{ csrf_field() }}
                        <div class="header text-center">Create Lecturer</div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">First Name <star>*</star></label>
                                        <input class="form-control" name="first_name" type="text" placeholder="Enter First name" required />
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Last Name <star>*</star></label>
                                        <input class="form-control" name="last_name" type="text" placeholder="Enter Last Name" required />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Email Address <star>*</star></label>
                                <input class="form-control" name="email" type="email" placeholder="Enter Email Address" required />
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Phone Number <star>*</star></label>
                                <input class="form-control" name="phone_number" type="number" placeholder="Enter Phone Number" required />
                            </div>

                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input class="form-control" name="password" id="registerPassword" placeholder="Enter Password" type="password" />
                                <p style="color: #8c7373;"><small>Password will default to "SECRET" if field is empty</small></p>
                            </div>

                            <div class="category"><star>*</star> Required fields</div>
                        </div>

                        <div class="footer text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop