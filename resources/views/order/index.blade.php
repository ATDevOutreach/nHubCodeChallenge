@extends('layouts.master')

@section('content')
  <!-- Start Page Content -->
  <div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12">
      <div class="card">
        <div class="card-body">
            <div class="d-flex no-block align-items-center m-b-30">
              <h4 class="card-title">All Contacts</h4>
            </div>
              <div class="table-responsive">
                  <table id="file_export" class="table table-bordered nowrap display">
                      <thead>
                          <tr>
                              <th> </th>
                              <th>Phone</th>
                              <th>Items</th>                              
                              <th>Ready Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($orders as $order)
                          <tr>
                              <td>
                                  <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="customControlValidation2" required>
                                      <label class="custom-control-label" for="customControlValidation2"></label>
                                  </div>
                              </td>
                              <td>{{ $order->phone }}</td>
                              <td>
                                  {{ $order->items }}
                              </td>
                              
                              <td>
                                @if($order->dispatched == 0)
                                  <span class="label label-warning">Pending</span>
                                @else
                                  <span class="label label-success">Dispatched</span> 
                                @endif    
                              </td>                            
                              <td>
                                @if($order->dispatched == 0)
                                  <form method="post" action="{{ route('dispatch_order', $order->id)}} ">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="dispatched" value="1">
                                    <input type="hidden" name="packaged" value="1">
                                    <input type="hidden" name="phone" value="{{ $order->phone }}">
                                    
                                    <button type="submit" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn btn-primary" data-toggle="tooltip" data-original-title="View order"><i class="ti-check" aria-hidden="true"></i></button>
                                  </form>  
                                @else
                                  <span class="label label-success">Completed</span> </td>
                                @endif 
                                                                
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  <!-- Column -->
  

  <!-- Create Modal -->
            <div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form methos="post" action="">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt m-r-10"></i> Create New Order (Temporary Form)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-user text-white"></i></button>
                                    <textarea type="text" class="form-control" placeholder="Enter Items here" aria-label="name"></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                                    <input type="text" class="form-control" placeholder="Enter Mobile Number Here" aria-label="no">
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
  <!-- End PAge Content -->
@endsection