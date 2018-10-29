@extends('layouts.main')

@section('title')
	Dashboard
@endsection


@section('content')

	<div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#">Dashboard</a></li>
                <li class="active">{{ $user->username }}</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="row row-in">
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <ul class="col-in">
                            <li>
                                <span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
                            </li>
                            <li class="col-last">
                                <h3 class="counter text-right m-t-15">23</h3>
                            </li>
                            <li class="col-middle">
                                <h4>New projects</h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br  b-r-none">
                        <ul class="col-in">
                            <li>
                                <span class="circle circle-md bg-info"><i class="ti-wallet"></i></span>
                            </li>
                            <li class="col-last">
                                <h3 class="counter text-right m-t-15">76</h3>
                            </li>
                            <li class="col-middle">
                                <h4>Total Earnings</h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 row-in-br">
                        <ul class="col-in">
                            <li>
                                <span class="circle circle-md bg-success"><i class=" ti-shopping-cart"></i></span>
                            </li>
                            <li class="col-last">
                                <h3 class="counter text-right m-t-15">93</h3>
                            </li>
                            <li class="col-middle">
                                <h4>Total Projects</h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6  b-0">
                        <ul class="col-in">
                            <li>
                                <span class="circle circle-md bg-warning"><i class="fa fa-dollar"></i></span>
                            </li>
                            <li class="col-last">
                                <h3 class="counter text-right m-t-15">83</h3>
                            </li>
                            <li class="col-middle">
                                <h4>Net Earnings</h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row -->
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12 col-lg-6 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Products Yearly Sales</h3>
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-info"></i>Mac</h5>
                    </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-danger"></i>Windows</h5>
                    </li>
                </ul>
                <div id="ct-visits" style="height: 285px;"></div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
            <div class="bg-theme-alt">
                <div id="ct-daily-sales" class="p-t-30" style="height: 300px"></div>
            </div>
            <div class="white-box">
                <div class="row">
                    <div class="col-xs-8">
                        <h2 class="m-b-0 font-medium">Week Sales</h2>
                        <h5 class="text-muted m-t-0">Ios app - 160 sales</h5>
                    </div>
                    <div class="col-xs-4">
                        <div class="circle circle-md bg-info pull-right m-t-10"><i class="ti-shopping-cart"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3 col-xs-12">
            <div class="panel wallet-widgets">
                <div class="panel-body">
                    <ul class="side-icon-text">
                        <li class="m-0"><a href="#"><span class="circle circle-md bg-success di vm"><i class="ti-plus"></i></span><div class="di vm"><h1 class="m-b-0">$458.50</h1><h5 class="m-t-0">Your wallet Banalce</h5></div></a></li>
                    </ul>
                </div>
                <div id="morris-area-chart2" style="height:108px"></div>
                <ul class="wallet-list">
                    <li><i class="icon-wallet"></i><a href="javascript:void(0)">Withdrow money</a></li>
                    <li><i class="icon-handbag"></i><a href="javascript:void(0)">Shop Now</a></li>
                    <li><i class="ti-archive"></i><a href="javascript:void(0)">Add funds</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- wallet, & manage users widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <!-- col-md-9 -->
        <div class="col-md-8 col-lg-9">
            <div class="manage-users">
                <div class="sttabs tabs-style-iconbox">
                    <nav>
                        <ul>
                            <li><a href="#section-iconbox-1" class="sticon ti-user"><span>Select Users</span></a></li>
                            <li><a href="#section-iconbox-2" class="sticon ti-lock"><span>Set Permissions</span></a></li>
                            <li><a href="#section-iconbox-3" class="sticon ti-receipt"><span>Message Users</span></a></li>
                            <li><a href="#section-iconbox-4" class="sticon ti-check-box"><span>Save and finish</span></a></li>
                        </ul>
                    </nav>
                    <div class="content-wrap">
                        <section id="section-iconbox-1">
                            <div class="p-20 row">
                                <div class="col-sm-6">
                                    <h3 class="m-t-0">Select Users to Manage</h3>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="side-icon-text pull-right">
                                        <li><a href="#"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add Users</span></a></li>
                                        <li><a href="#"><span class="circle circle-sm bg-danger di"><i class="ti-pencil-alt"></i></span><span>Edit</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="table-responsive manage-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th style="width: 150px;">NAME</th>
                                            <th>POSITION</th>
                                            <th>JOINED</th>
                                            <th>LOCATION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="advance-table-row active">
                                            <td style="width: 10px;"></td>
                                            <td style="width: 40px;">
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox7" checked="" type="checkbox">
                                                    <label for="checkbox7"> </label>
                                                </div>
                                            </td>
                                            <td style="width: 60px;"><img src="/assets/plugins/images/users/varun.jpg" class="img-circle" width="30" alt="user img" /></td>
                                            <td>Andrew Simons</td>
                                            <td>Modulator</td>
                                            <td>6 May 2016</td>
                                            <td>Gujrat, India</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox8" type="checkbox">
                                                    <label for="checkbox8"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/genu.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Hanna Gover</td>
                                            <td>Admin</td>
                                            <td>13 Jan 2005</td>
                                            <td>Texas, United states</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox9" type="checkbox">
                                                    <label for="checkbox9"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/sonu.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Joshi Nirav</td>
                                            <td>Admin</td>
                                            <td>21 Mar 2001</td>
                                            <td>Bhavnagar, India</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox10" type="checkbox">
                                                    <label for="checkbox10"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/pawandeep.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Joshi Sunil</td>
                                            <td>Admin</td>
                                            <td>21 Mar 2004</td>
                                            <td>Gujarat, India</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-10 p-t-30 row">
                                <div class="col-sm-8">
                                    <h3>1 members selected</h3>
                                </div>
                                <div class="col-sm-2 pull-right m-t-10"><a href="javascript:void(0);" class="btn btn-block p-10 btn-rounded btn-danger"><span>Next</span><i class="ti-arrow-right m-l-5"></i></a></div>
                            </div>
                        </section>
                        <section id="section-iconbox-2">
                            <div class="p-20 row">
                                <div class="col-sm-6">
                                    <h3 class="m-t-0">Set Users Permission</h3>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="side-icon-text pull-right">
                                        <li><a href="#"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add Users</span></a></li>
                                        <li><a href="#"><span class="circle circle-sm bg-danger di"><i class="ti-pencil-alt"></i></span><span>Edit</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="table-responsive manage-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>NAME</th>
                                            <th>POSITION</th>
                                            <th>JOINED</th>
                                            <th>LOCATION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="advance-table-row">
                                            <td style="width: 10px;"></td>
                                            <td style="width: 40px;">
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox19" type="checkbox">
                                                    <label for="checkbox19"> </label>
                                                </div>
                                            </td>
                                            <td style="width: 60px;"><img src="/assets/plugins/images/users/varun.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Andrew Simons</td>
                                            <td>Modulator</td>
                                            <td>6 May 2016</td>
                                            <td>Gujrat, India</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row active">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox11" checked="" type="checkbox">
                                                    <label for="checkbox11"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/genu.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Hanna Gover</td>
                                            <td>Admin</td>
                                            <td>13 Jan 2005</td>
                                            <td>Texas, United states</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox12" type="checkbox">
                                                    <label for="checkbox12"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/sonu.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Joshi Nirav</td>
                                            <td>Admin</td>
                                            <td>21 Mar 2001</td>
                                            <td>Bhavnagar, India</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox13" type="checkbox">
                                                    <label for="checkbox13"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/pawandeep.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Joshi Sunil</td>
                                            <td>Admin</td>
                                            <td>21 Mar 2004</td>
                                            <td>Gujarat, India</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-10 row">
                                <div class="col-sm-8">
                                    <h3>1 members selected</h3>
                                </div>
                                <div class="col-sm-2 pull-right m-t-10"><a href="javascript:void(0);" class="btn btn-block p-10 btn-rounded btn-danger"><span>Next</span><i class="ti-arrow-right m-l-5"></i></a></div>
                            </div>
                        </section>
                        <section id="section-iconbox-3">
                            <div class="p-20 row">
                                <div class="col-sm-6">
                                    <h3 class="m-t-0">Manage Users</h3>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="side-icon-text pull-right">
                                        <li><a href="#"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add Users</span></a></li>
                                        <li><a href="#"><span class="circle circle-sm bg-danger di"><i class="ti-pencil-alt"></i></span><span>Edit</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="table-responsive manage-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>NAME</th>
                                            <th>POSITION</th>
                                            <th>JOINED</th>
                                            <th>LOCATION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="advance-table-row">
                                            <td style="width: 10px;"></td>
                                            <td style="width: 40px;">
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox14" type="checkbox">
                                                    <label for="checkbox14"> </label>
                                                </div>
                                            </td>
                                            <td style="width: 60px;"><img src="/assets/plugins/images/users/varun.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Andrew Simons</td>
                                            <td>Modulator</td>
                                            <td>6 May 2016</td>
                                            <td>Gujrat, India</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox15" type="checkbox">
                                                    <label for="checkbox15"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/genu.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Hanna Gover</td>
                                            <td>Admin</td>
                                            <td>13 Jan 2005</td>
                                            <td>Texas, United states</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row active">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox16" checked="" type="checkbox">
                                                    <label for="checkbox16"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/sonu.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Joshi Nirav</td>
                                            <td>Admin</td>
                                            <td>21 Mar 2001</td>
                                            <td>Bhavnagar, India</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox17" type="checkbox">
                                                    <label for="checkbox17"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/pawandeep.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Joshi Sunil</td>
                                            <td>Admin</td>
                                            <td>21 Mar 2004</td>
                                            <td>Gujarat, India</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-10 row">
                                <div class="col-sm-8">
                                    <h3>1 members selected</h3>
                                </div>
                                <div class="col-sm-2 pull-right m-t-10"><a href="javascript:void(0);" class="btn btn-block p-10 btn-rounded btn-danger"><span>Next</span><i class="ti-arrow-right m-l-5"></i></a></div>
                            </div>
                        </section>
                        <section id="section-iconbox-4">
                            <div class="p-20 row">
                                <div class="col-sm-6">
                                    <h3 class="m-t-0">Save and finish</h3>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="side-icon-text pull-right">
                                        <li><a href="#"><span class="circle circle-sm bg-success di"><i class="ti-plus"></i></span><span>Add Users</span></a></li>
                                        <li><a href="#"><span class="circle circle-sm bg-danger di"><i class="ti-pencil-alt"></i></span><span>Edit</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="table-responsive manage-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>NAME</th>
                                            <th>POSITION</th>
                                            <th>JOINED</th>
                                            <th>LOCATION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="advance-table-row">
                                            <td style="width: 10px;"></td>
                                            <td style="width: 40px;">
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox23" type="checkbox">
                                                    <label for="checkbox23"> </label>
                                                </div>
                                            </td>
                                            <td style="width: 60px;"><img src="/assets/plugins/images/users/varun.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Andrew Simons</td>
                                            <td>Modulator</td>
                                            <td>6 May 2016</td>
                                            <td>Gujrat, India</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox20" type="checkbox">
                                                    <label for="checkbox20"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/genu.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Hanna Gover</td>
                                            <td>Admin</td>
                                            <td>13 Jan 2005</td>
                                            <td>Texas, United states</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox21" type="checkbox">
                                                    <label for="checkbox21"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/sonu.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Joshi Nirav</td>
                                            <td>Admin</td>
                                            <td>21 Mar 2001</td>
                                            <td>Bhavnagar, India</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="sm-pd"></td>
                                        </tr>
                                        <tr class="advance-table-row active">
                                            <td></td>
                                            <td>
                                                <div class="checkbox checkbox-circle checkbox-info">
                                                    <input id="checkbox22" checked="" type="checkbox">
                                                    <label for="checkbox22"> </label>
                                                </div>
                                            </td>
                                            <td><img src="/assets/plugins/images/users/pawandeep.jpg" alt="user img" class="img-circle" width="30" /></td>
                                            <td>Joshi Sunil</td>
                                            <td>Admin</td>
                                            <td>21 Mar 2004</td>
                                            <td>Gujarat, India</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-10 row">
                                <div class="col-sm-8">
                                    <h3>1 members selected</h3>
                                </div>
                                <div class="col-sm-2 pull-right m-t-10"><a href="javascript:void(0);" class="btn btn-block p-10 btn-rounded btn-danger"><span>Save</span><i class="ti-arrow-right m-l-5"></i></a></div>
                            </div>
                        </section>
                    </div>
                    <!-- /content -->
                </div>
                <!-- /tabs -->
            </div>
        </div>
        <!-- /col-md-9 -->
        <!-- col-md-3 -->
        <div class="col-md-4 col-lg-3">
            <div class="panel wallet-widgets">
                <div class="panel-body">
                    <ul class="side-icon-text">
                        <li class="m-0"><a href="#"><span class="circle circle-md bg-success di vm"><i class="ti-plus"></i></span><div class="di vm"><h1 class="m-b-0">$458.50</h1><h5 class="m-t-0">Your wallet Banalce</h5></div></a></li>
                    </ul>
                </div>
                <div id="morris-area-chart2" style="height:108px"></div>
                <ul class="wallet-list">
                    <li><i class="icon-wallet"></i><a href="javascript:void(0)">Withdrow money</a></li>
                    <li><i class="icon-handbag"></i><a href="javascript:void(0)">Shop Now</a></li>
                    <li><i class="ti-archive"></i><a href="javascript:void(0)">Add funds</a></li>
                    <li><i class=" ti-wallet"></i><a href="javascript:void(0)">Withdrow money</a></li>
                    <li><i class="icon-wallet"></i><a href="javascript:void(0)">Withdrow money</a></li>
                    <li><i class="icon-handbag"></i><a href="javascript:void(0)">Shop Now</a></li>
                </ul>
            </div>
        </div>
        <!-- /col-md-3 -->
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Profile, & inbox widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-4">
            <div class="panel">
                <div class="p-30">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4"><img src="/assets/plugins/images/users/varun.jpg" alt="varun" class="img-circle img-responsive"></div>
                        <div class="col-xs-12 col-sm-8">
                            <h2 class="m-b-0">Daniel Kristeen</h2>
                            <h4>UIUX Designer</h4><a href="javascript:void(0)" class="btn btn-rounded btn-success"><i class="ti-plus m-r-5"></i> FOLLOW</a></div>
                    </div>
                    <div class="row text-center m-t-30">
                        <div class="col-xs-4 b-r">
                            <h2>14</h2>
                            <h4>PHOTOS</h4>
                        </div>
                        <div class="col-xs-4 b-r">
                            <h2>54</h2>
                            <h4>VIDEOS</h4>
                        </div>
                        <div class="col-xs-4">
                            <h2>145</h2>
                            <h4>TASKS</h4>
                        </div>
                    </div>
                </div>
                <hr class="m-t-10" />
                <div class="p-20 text-center">
                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore </p>
                    <hr>
                    <h4 class="m-t-30 font-medium">Followers</h4>
                    <ul class="dp-table m-t-30">
                        <li><img src="/assets/plugins/images/users/varun.jpg" alt="varun" width="60" data-toggle="tooltip" title="Varun Dhavan" class="img-circle"></li>
                        <li><img src="/assets/plugins/images/users/genu.jpg" alt="varun" width="60" data-toggle="tooltip" title="Varun Dhavan" class="img-circle"></li>
                        <li><img src="/assets/plugins/images/users/pawandeep.jpg" alt="varun" width="60" data-toggle="tooltip" title="Varun Dhavan" class="img-circle"></li>
                        <li><a href="" class="circle circle-md bg-info di" data-toggle="tooltip" title="More">5+</a></li>
                    </ul>
                </div>
                <hr>
                <ul class="dp-table profile-social-icons">
                    <li><a href="javascript:void(0)"><i class="fa fa-globe"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6 col-lg-8 col-sm-12">
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
                                <th>CATEGORY</th>
                                <th>MANAGE</th>
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
                                <td>
                                    <select class="form-control">
                                        <option>Modulator</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                        <option>Subscriber</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td><span class="font-medium">Daniel Kristeen</span>
                                    <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                <td>Visual Designer
                                    <br/><span class="text-muted">Past : teacher</span></td>
                                <td>daniel@website.com
                                    <br/><span class="text-muted">999 - 444 - 555</span></td>
                                <td>
                                    <select class="form-control">
                                        <option>Modulator</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                        <option>Subscriber</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td><span class="font-medium">Daniel Kristeen</span>
                                    <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                <td>Visual Designer
                                    <br/><span class="text-muted">Past : teacher</span></td>
                                <td>daniel@website.com
                                    <br/><span class="text-muted">999 - 444 - 555</span></td>
                                <td>
                                    <select class="form-control">
                                        <option>Modulator</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                        <option>Subscriber</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td><span class="font-medium">Daniel Kristeen</span>
                                    <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                <td>Visual Designer
                                    <br/><span class="text-muted">Past : teacher</span></td>
                                <td>daniel@website.com
                                    <br/><span class="text-muted">999 - 444 - 555</span></td>
                                <td>
                                    <select class="form-control">
                                        <option>Modulator</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                        <option>Subscriber</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td><span class="font-medium">Daniel Kristeen</span>
                                    <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                <td>Visual Designer
                                    <br/><span class="text-muted">Past : teacher</span></td>
                                <td>daniel@website.com
                                    <br/><span class="text-muted">999 - 444 - 555</span></td>
                                <td>
                                    <select class="form-control">
                                        <option>Modulator</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                        <option>Subscriber</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td><span class="font-medium">Daniel Kristeen</span>
                                    <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                <td>Visual Designer
                                    <br/><span class="text-muted">Past : teacher</span></td>
                                <td>daniel@website.com
                                    <br/><span class="text-muted">999 - 444 - 555</span></td>
                                <td>
                                    <select class="form-control">
                                        <option>Modulator</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                        <option>Subscriber</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td><span class="font-medium">Daniel Kristeen</span>
                                    <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                <td>Visual Designer
                                    <br/><span class="text-muted">Past : teacher</span></td>
                                <td>daniel@website.com
                                    <br/><span class="text-muted">999 - 444 - 555</span></td>
                                <td>
                                    <select class="form-control">
                                        <option>Modulator</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                        <option>Subscriber</option>
                                    </select>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop