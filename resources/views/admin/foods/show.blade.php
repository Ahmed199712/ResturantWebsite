<!-- Large modal -->


<div class="modal fade showFoods" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!-- Start Form -->
      <form id="showFoodForm" action="{{ url('/foods/show') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

            <div class="modal-header" style="font-size:20px">
                {{ trans('backend.showdetails') }}
            </div>
            <div class="modal-body">

               <div class="row">
                 <div class="col-md-5">
                    <img class="img-thumbnail" id="showFoodImage" src="" style="width:100%;height:350px">
                 </div>
                 <div class="col-md-7">
                    <h4> <b style="color:#5690d8"> {{ trans('backend.name') }}: &nbsp; </b> <span id="showName"></span> </h4>
                    <h4> <b style="color:#5690d8"> {{ trans('backend.price') }}: &nbsp; </b> <span id="showPrice"></span> </h4>
                    <h4> <b style="color:#5690d8"> {{ trans('backend.discount') }}: &nbsp; </b> <span id="showDiscount"></span> </h4>
                    <h4> <b style="color:#5690d8"> {{ trans('backend.category') }}: &nbsp; </b> <span id="showCategory"></span> </h4>
                    <hr>
                    <h4> <b style="color:#5690d8"> {{ trans('backend.desc') }}:- <br></b> <span style="line-height: 30px" id="showDesc"></span> </h4>
                 </div>
               </div>

            </div>

            <div class="modal-footer">
                <button style="border-radius:0;transition:.3s" type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('backend.close') }}</button>
            </div>
            
      </form>

      <!-- End Form -->

    </div>
  </div>
</div>

