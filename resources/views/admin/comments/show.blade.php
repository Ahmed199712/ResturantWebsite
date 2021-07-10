<!-- Large modal -->


<div class="modal fade showComment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!-- Start Form -->
    
            <div class="modal-header" style="font-size:20px">
                {{ trans('backend.showdetails') }}
            </div>
            <div class="modal-body">

               <div class="row">
                 <div class="col-md-4">
                    <img class="img-thumbnail" id="showFoodImage" src="" style="width:100%;height:250px">
                 </div>
                 <div class="col-md-7">
                    
                  <h4> <b style="color:#5690d8"> {{ trans('backend.comment') }}:- &nbsp; <br><br></b> <span id="showComment"></span> </h4>

                 </div>
               </div>

            </div>

            <div class="modal-footer">
                <button style="border-radius:0;transition:.3s" type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('backend.close') }}</button>
            </div>


      <!-- End Form -->

    </div>
  </div>
</div>

