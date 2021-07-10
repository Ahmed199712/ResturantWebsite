<!-- Large modal -->


<div class="modal fade createNewUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!-- Start Form -->
      <form id="createUserForm" action="{{ url('/users/store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

            <div class="modal-header" style="font-size:20px">
                <b style="color:#3c8dbc">{{ trans('backend.clients') }}</b> - {{ trans('backend.addnew') }}
            </div>
            <div class="modal-body">

                <!-- Erros Validation -->
                <div id="allErrorsHere" class="alert alert-danger" style="display:none">

                </div>

                
               
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label> {{ trans('backend.image') }} </label><br>
                    <img style="margin:5px 0;width:100%;height:286px" class="img-thumbnail" id="userImagePreview" src="{{ asset('uploads/avatars/default.png') }}">
                    <input type="file" id="userImage" name="avatar" class="form-control">
                  </div>
                </div>
                <div class="col-md-7">

                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.name') }}</label>
                        <input type="text" name="name" class="form-control">
                      </div>    
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.email') }}</label>
                        <input type="email" name="email" class="form-control">
                      </div>    
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{ trans('backend.password') }}</label>
                        <input type="password" name="password" class="form-control">
                      </div>    
                    </div>

                     <div class="col-md-6">
                      <div class="form-group">
                        <label>{{ trans('backend.password_confirmation') }}</label>
                        <input type="password" name="password_confirmation" class="form-control">
                      </div>    
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.phone') }}</label>
                        <input type="number" name="phone" class="form-control">
                      </div>    
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.address') }}</label>
                        <input type="text" name="address" class="form-control">
                      </div>    
                    </div>


                  </div>
                </div>
              </div>


            </div>
            <div class="modal-footer">
                <button style="border-radius:0;transition:.3s" type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('backend.close') }}</button>
                <button style="border-radius:0;transition:.3s"  type="submit" class="btn btn-primary">{{ trans('backend.addnew') }} <i class="fa fa-spin fa-spinner fa-2x" style="display:none"></i> </button>
            </div>

      </form>

      <!-- End Form -->

    </div>
  </div>
</div>

