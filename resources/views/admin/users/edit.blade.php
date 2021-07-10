<!-- Large modal -->


<div class="modal fade editNewUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!-- Start Form -->
      <form id="updateUserForm" action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}



        <input type="hidden" name="userID" id="userID">



            <div class="modal-header" style="font-size:20px">
                <b style="color:#3c8dbc">{{ trans('backend.clients') }}</b> - {{ trans('backend.edit') }}
            </div>
            <div class="modal-body">

                <!-- Erros Validation -->
                <div id="allErrorsHereUpdate" class="alert alert-danger" style="display:none">

                </div>

                
               
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label> {{ trans('backend.image') }} </label><br>
                    <img style="margin:5px 0;width:100%;height:286px" class="img-thumbnail" id="userImagePreviewEdit" src="">
                    <input type="file" id="userImageEdit" name="avatar" class="form-control">
                  </div>
                </div>
                <div class="col-md-7">

                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.name') }}</label>
                        <input type="text" id="userName" name="name" class="form-control">
                      </div>    
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.email') }}</label>
                        <input type="email" id="userEmail" name="email" class="form-control">
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
                        <input type="number" id="userPhone" name="phone" class="form-control">
                      </div>    
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.address') }}</label>
                        <input type="text" id="userAddress" name="address" class="form-control">
                      </div>    
                    </div>


                  </div>
                </div>
              </div>


            </div>
            <div class="modal-footer">
                <button style="border-radius:0;transition:.3s" type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('backend.close') }}</button>
                <button style="border-radius:0;transition:.3s"  type="submit" class="btn btn-success">{{ trans('backend.edit') }} <i class="fa fa-spin fa-spinner fa-2x" style="display:none"></i> </button>
            </div>

      </form>

      <!-- End Form -->

    </div>
  </div>
</div>

