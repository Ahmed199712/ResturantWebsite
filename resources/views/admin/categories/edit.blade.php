<!-- Large modal -->


<div class="modal fade editCategory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form id="updateCategoryForm" action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}



        <input type="hidden" name="catID" id="catID">

            <div class="modal-header"  style="font-size:20px">
                {{ trans('backend.edit') }}
            </div>
            <div class="modal-body">

                <!-- Erros Validation -->
                <div id="allErrorsHereEdit" class="alert alert-danger" style="display:none">

                </div>

                <div class="form-group">
                    <label>{{ trans('backend.name') }}</label>
                    <input type="text" name="name" id="catNameEdit" class="form-control" placeholder="{{ trans('backend.name') }}">
                </div>

            </div>
            <div class="modal-footer">
                <button id="close" style="border-radius:0;transition:.3s" type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-close"></i> {{ trans('backend.close') }}</button>
                <button style="border-radius:0;transition:.3s"  type="submit" class="btn btn-primary">{{ trans('backend.edit') }} <i class="fa fa-spin fa-spinner fa-2x" style="display:none"></i></button>
            </div>

      </form>

    </div>
  </div>
</div>

