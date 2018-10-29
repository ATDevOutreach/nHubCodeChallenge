@extends('layouts.master')

@section('content')	
	<div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <!-- <a href="#" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a> -->
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li class="active">{{ Sentinel::getUser()->email }}</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- ============================================================== -->
        <!-- Other sales widgets -->
        <!-- ============================================================== -->
        <!-- .row -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">NEW CLIENTS</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-people text-info"></i></li>
                        <li class="text-right"><span class="counter">23</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">NEW Projects</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-folder text-purple"></i></li>
                        <li class="text-right"><span class="counter">169</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Open Projects</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-folder-alt text-danger"></i></li>
                        <li class="text-right"><span class="">311</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">NEW Invoices</h3>
                    <ul class="list-inline two-part">
                        <li><i class="ti-wallet text-success"></i></li>
                        <li class="text-right"><span class="">117</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->
                       
        <!-- ============================================================== -->
        <!-- Demo table -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">MANAGE USERS</div>
                    <div class="table-responsive">
                        <table class="table table-hover manage-u-table">
                            <thead>
                                <tr>
                                    <th style="width: 70px;" class="text-center">#</th>
                                    <th>NAME</th>
                                    <th>OCCUPATION</th>
                                    <th>EMAIL</th>
                                    <th>ADDED</th>
                                    <th style="width: 250px;">CATEGORY</th>
                                    <th style="width: 300px;">MANAGE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td><span class="font-medium">Daniel Kristeen</span>
                                        <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                    <td>Visual Designer
                                        <br/><span class="text-muted">Past : teacher</span></td>
                                    <td>daniel@website.com
                                        <br/><span class="text-muted">999 - 444 - 555</span></td>
                                    <td>15 Mar 1988
                                        <br/><span class="text-muted">10: 55 AM</span></td>
                                    <td>
                                        <select class="form-control">
                                            <option>Modulator</option>
                                            <option>Admin</option>
                                            <option>User</option>
                                            <option>Subscriber</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button>
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                                    </td>
                                </tr>                                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection