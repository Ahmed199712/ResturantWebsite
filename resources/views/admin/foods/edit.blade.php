<!-- Large modal -->


<div class="modal fade editFood" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!-- Start Form -->
      <form id="editFoodForm" action="{{ route('food.update') }}" method="POST"  enctype="multipart/form-data" >
        {{ csrf_field() }}

            <div class="modal-header" style="font-size:20px">
                {{ trans('backend.edit') }}
            </div>
            <div class="modal-body">

                <!-- Erros Validation -->
                <div id="allErrorsHereUpdate" class="alert alert-danger" style="display:none">

                </div>

                <input type="hidden" name="foodID" id="foodID">
                
               
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label> {{ trans('backend.image') }} </label><br>
                    <img style="margin:5px 0;width:100%;height:258px" class="img-thumbnail" id="foodImageEditPreview" src="{{ asset('uploads/foods/default.jpg') }}">
                    <input type="file" id="foodImageEdit" name="image" class="form-control">
                  </div>
                </div>
                <div class="col-md-8">

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{ trans('backend.name') }}</label>
                        <input type="text" name="name" id="editFoodName" class="form-control">
                      </div>    
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{ trans('backend.category') }}</label>
                        <select class="form-control" name="category_id" id="getCategoriesSelected">
                          
                        </select>
                      </div>    
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{ trans('backend.price') }}</label>
                        <input type="number" name="price" id="editFoodPrice" class="form-control">
                      </div>    
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>{{ trans('backend.discount') }}</label>
                        <input type="number" name="discount" id="editFoodDiscount" class="form-control">
                      </div>    
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.desc') }}</label>
                        <textarea class="form-control" name="desc" id="editFoodDesc" rows="7"></textarea>
                      </div>    
                    </div>


                  </div>
                </div>
              </div>


            </div>
            <div class="modal-footer">
                <button style="border-radius:0;transition:.3s" type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('backend.close') }}</button>
                <button style="border-radius:0;transition:.3s"  type="submit" class="btn btn-success">{{ trans('backend.edit') }} <i class="fa fa-spin fa-spinner fa-2x food" style="display:none"></i> </button>
            </div>

      </form>

      <!-- End Form -->

    </div>
  </div>
</div>

