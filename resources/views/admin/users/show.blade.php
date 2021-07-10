<!-- Large modal -->


<div class="modal fade viewNewUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="font-size:20px">
            <div class="text-center">
              <b style="color:#f34747">{{ trans('backend.clients') }}</b> - {{ trans('backend.showdetails') }}
            </div>
        </div>
        <div class="modal-body">

            
          <div class="row">
             <div class="col-md-5">
                <img class="img-thumbnail" id="showUserImage" src="" style="width:100%;height:350px">
             </div>
             <div class="col-md-7">
                <h4> <b style="color:#5690d8"> {{ trans('backend.name') }}: &nbsp; </b> <span id="showName"></span> </h4>
                <hr>
                <h4> <b style="color:#5690d8"> {{ trans('backend.email') }}: &nbsp; </b> <span id="showEmail"></span> </h4>
                <hr>
                <h4> <b style="color:#5690d8"> {{ trans('backend.phone') }}: &nbsp; </b> <span id="showPhone"></span> </h4>
                <hr>
                <h4> <b style="color:#5690d8"> {{ trans('backend.address') }}: &nbsp; </b> <span id="showAddress"></span> </h4>
                <hr>
                
             </div>
           </div>



        </div>
        <div class="modal-footer">
            <button style="border-radius:0;transition:.3s" type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('backend.close') }}</button>
        </div>

    </div>
  </div>
</div>

