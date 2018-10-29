@extends('layouts.master')

@section('styles')

@endsection

@section('scripts')
	{{ Html::script('/plugins/bower_components/dropify/dist/js/dropify.min.js') }}
	<script>
    $(document).ready(function() {
      // Basic
      $('.dropify').dropify();
      // Translated
      $('.dropify-fr').dropify({
        messages: {
          default: 'Glissez-déposez un fichier ici ou cliquez',
          replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
          remove: 'Supprimer',
          error: 'Désolé, le fichier trop volumineux'
        }
      });
      // Used events
      var drEvent = $('#input-file-events').dropify();
      drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
      });
      drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
      });
      drEvent.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
      });
      var drDestroy = $('#input-file-to-destroy').dropify();
      drDestroy = drDestroy.data('dropify')
      $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
          drDestroy.destroy();
        } else {
          drDestroy.init();
        }
      })
    });
  </script>
@endsection

@section('content')	
	<div class="container-fluid">
		<div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Dashboard</h4> 
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="index.html">Dashboard</a></li>
					<li class="active">{{ $user->first_name }}</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
		</div>       
    <!-- .row -->
    <div class="row">
      <div class="col-md-4 col-xs-12">
        <div class="white-box">
          <div class="user-bg"> 
          	<img width="100%" alt="user" src="../plugins/images/large/img1.jpg">
            <div class="overlay-box">
             	<div class="user-content">
                <a href="javascript:void(0)">
                	<img src="../plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img">
                </a>
                <h4 class="text-white">{{ $user->first_name }} {{ $user->last_name }}</h4>
                <h5 class="text-white">{{ $user->email }}</h5> 
              </div>
            </div>
          </div>
          <div class="user-btm-box">
            <div class="col-md-4 col-sm-4 text-center">
              <p class="text-purple">
              	<i class="ti-facebook"></i>
              </p>
              <h1>258</h1> 
            </div>
            <div class="col-md-4 col-sm-4 text-center">
              <p class="text-blue">
              	<i class="ti-twitter"></i>
              </p>
              <h1>125</h1> 
            </div>
            <div class="col-md-4 col-sm-4 text-center">
              <p class="text-danger">
              	<i class="ti-dribbble"></i>
              </p>
              <h1>556</h1> 
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-xs-12">
        <div class="white-box">
          <ul class="nav nav-tabs tabs customtab">              
            <li class="tab active">
              <a href="#profile" data-toggle="tab"> 
              	<span class="visible-xs">
              		<i class="fa fa-user"></i>
              	</span> 
              	<span class="hidden-xs">Profile</span> 
              </a>
            </li>
            <li class="tab">
              <a href="#settings" data-toggle="tab" aria-expanded="false"> 
              	<span class="visible-xs">
              		<i class="fa fa-cog"></i>
              	</span> 
              	<span class="hidden-xs">Settings</span> 
              </a>
            </li>
          </ul>
          <div class="tab-content">                    
            <div class="tab-pane active" id="profile">
              <div class="row">
                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                  <br>	
                  <p class="text-muted">{{ $user->first_name }} {{ $user->last_name }}</p>
                </div>
                <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                  <br>
                  <p class="text-muted">{{ $user->phone_number }}</p>
                </div>
                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                  <br>
                  <p class="text-muted">{{ $user->email }}</p>
                </div>
                <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                	<br>
                  <p class="text-muted">{{ $user->country }}</p>
                </div>
              </div>
              <hr>
              <p class="m-t-30">
              	{{ $user->address }}
              </p>                        
              <h4 class="font-bold m-t-30">Skill Set</h4>
              <hr>
              <p class="m-t-30">{{ $user->address }}</p> 
              <a class="btn btn-success waves-effect waves-light" href="{{ route('profile.edit', $user->id) }}">
              	<span class="btn-label"><i class="fa fa-pencil"></i></span>Edit Profile
              </a>                       
            </div>
                    
            <div class="tab-pane" id="settings">
              <form class="form-horizontal form-material" action="#" method="post">
              	{{ csrf_field() }}
              	<div class="row">
	              	<div class="col-md-6">
		                <div class="form-group">
		                 	<label class="col-md-12">First Name</label>
		                  <div class="col-md-12">
		                    <input type="text" name="first_name" placeholder="John" value="{{ $user->first_name }}" class="form-control form-control-line"> 
		                  </div>
		                </div>
		              </div>
		              
		              <div class="col-md-6">
		                <div class="form-group">
		                 	<label class="col-md-12">Last Name</label>
		                  <div class="col-md-12">
		                    <input type="text" name="last_name" placeholder="Doe" value="{{ $user->last_name }}" class="form-control form-control-line"> 
		                  </div>
		                </div>
		              </div>
	            	</div>
	            	
                <div class="form-group">
                  <label for="example-email" class="col-md-12">Email</label>
                  <div class="col-md-12">
                    <input type="email" disabled placeholder="johndoe@afri-connect.online" value="{{ $user->email }}" class="form-control form-control-line" name="email" id="email"> 
                  </div>
                </div>                
                
	              <div class="form-group">
	                <label class="col-md-12">Position</label>
	                <div class="col-md-12">
	                  <input type="text" value="{{ $user->position }}" name="position" class="form-control form-control-line"> 
	                </div>
	              </div>
                
                <div class="form-group">
                  <label class="col-md-12">Phone No</label>
                  <div class="col-md-12">
                    <input type="text" name="phone_number" value="{{ $user->phone_number }}" placeholder="123 456 7890" class="form-control form-control-line"> 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-12">Address</label>
                  <div class="col-md-12">
                    <textarea rows="5" class="form-control form-control-line">
                    	{{ $user->address }}
                    </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-12">Twitter Handle</label>
                  <div class="col-md-12">
                    <input type="text" name="twitter" value="{{ $user->twitter }}" placeholder="twitter.com/afri-connect" class="form-control form-control-line"> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Facebook Username</label>
                  <div class="col-md-12">
                    <input type="text" name="facebook" value="{{ $user->facebook }}" placeholder="facebook.com/afri-connect" class="form-control form-control-line"> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">LinkId</label>
                  <div class="col-md-12">
                    <input type="text" name="linkdin" value="{{ $user->linkdin }}" placeholder="linkdin.com/afri-connect-123" class="form-control form-control-line"> 
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Google Plus</label>
                  <div class="col-md-12">
                    <input type="text" name="gplus" value="{{ $user->gplus }}" placeholder="afri-connect" class="form-control form-control-line"> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-xs-12">
                    <div class="white-box">
                      <h3 class="box-title">Upload Profile Picture</h3>
                      <label for="input-file-max-fs">Maximum file size allowed is 2MB</label>
                      <input type="file" id="input-file-max-fs" data-default-file="{{ $user->profile_pic }}" name="profile_pic" class="dropify" data-max-file-size="2M" /> 
                    </div>
                  </div>                    
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button class="btn btn-success btn-lg">Update Profile</button>
                  </div>
                </div>
            	</form>
          	</div>
        	</div>
      	</div>
    	</div>
  	</div>    
	</div>
@endsection