<!-- Large modal -->


<div class="modal fade createNewSlider" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!-- Start Form -->
      <form id="createSliderForm" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

            <div class="modal-header" style="font-size:20px">
                <b style="color:#3c8dbc">{{ trans('backend.sliders') }}</b> - {{ trans('backend.addnew') }}
            </div>
            <div class="modal-body">

                <!-- Erros Validation -->
                <div id="allErrorsHere" class="alert alert-danger" style="display:none">

                </div>

                
               
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label> {{ trans('backend.image') }} </label><br>
                    <img style="margin:5px 0;width:100%;height:320px" class="img-thumbnail" id="sliderImagePreview" src="{{ asset('uploads/sliders/default.gif') }}">
                    <input type="file" id="sliderImage" name="image" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.name') }}</label>
                        <input type="text" name="name" class="form-control">
                      </div>    
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>{{ trans('backend.desc') }}</label>
                        <textarea class="form-control" name="desc" rows="12"></textarea>
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

