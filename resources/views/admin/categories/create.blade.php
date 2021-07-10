<!-- Large modal -->


<div class="modal fade createNewCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!-- Start Form -->
      <form id="createCategoryForm" action="{{ url('/categories/store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

            <div class="modal-header" style="font-size:20px">
                {{ trans('backend.addnew') }}
            </div>
            <div class="modal-body">

                <!-- Erros Validation -->
                <div id="allErrorsHere" class="alert alert-danger" style="display:none">

                </div>

                <div class="form-group">
                    <label>{{ trans('backend.name') }}</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="{{ trans('backend.name') }}">
                    
                    <span class="" style="color:red" id="errors"></span>

                </div>

            </div>
            <div class="modal-footer">
                <button id="close" style="border-radius:0;transition:.3s" type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('backend.close') }}</button>
                <button style="border-radius:0;transition:.3s"  type="submit" class="btn btn-primary">{{ trans('backend.addnew') }} <i class="fa fa-spin fa-spinner fa-2x" style="display:none"></i> </button>
            </div>

      </form>

      <!-- End Form -->

    </div>
  </div>
</div>

