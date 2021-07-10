@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeCategoryURL" data-url="{{ route('category.store') }}"></span>
<span id="getSlidersURL" data-url="{{ route('slider.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.sliders') }} @if( app()->getLocale() == 'en' ) <a id="getCategoriesToSelectBox" style="margin-left:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewSlider" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @else <a id="getCategoriesToSelectBox" style="margin-right:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewSlider" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @endif
        </h3>
        <div class="box-body">

            <div class="table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $index=>$slider)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img style="width:150px;height:150px" src="{{ asset($slider->image) }}">
                                </td>
                                <td>{{ $slider->name }}</td>
                                <td>{{ $slider->desc }}</td>
                                <td>
                                    
                                    <a href="{{ route('slider.delete' , $slider->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $slider->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('admin.sliders.create');


        </div>
    </div>



    <!-- The Script Of The Page -->
   @push('scripts')
   <script>
        $(document).ready(function(){

            $('#close').click(function(){
                $('#allErrorsHere').fadeOut();
                $('#allErrorsHereEdit').fadeOut();
            });
            // Function To Get All Data ...
            function getAllData(){
                var url = $('#getSlidersURL').data('url');

                $.ajax({
                    url : url ,
                    type : 'GET',
                    dataType : 'HTML',
                    success : function(data){
                        $('#allDataHere').html(data);
                        $('#myTable').DataTable().ajax.reload;
                    }
                });

            }

            // Store Slider By AJAX ...
            $('#createSliderForm').submit(function(e){
                e.preventDefault();

                var url = $(this).attr('action');
                var form = $(this);

                $.ajax({
                    url : url , 
                    type : 'POST',
                    dataType : 'JSON',
                    processData : false,
                    contentType : false,
                    data : new FormData(this),
                    beforeSend : function(){
                        $('.fa-spinner').css('display','block');
                        $('.fa-spinner').parent().attr('disabled' , 'true');
                    },
                    success: function(data){
                        if( $.isEmptyObject(data.errors) )
                        {
                            getAllData();
                            $('.createNewSlider').modal('hide');
                            form[0].reset();
                            swal('{{ trans("backend.greatjob") }}' , '{{ trans("backend.created_successfully") }}' , 'success')

                            console.log(data);


                            $('#allErrorsHere').fadeOut();
                            $('.fa-spinner').css('display','none');
                            $('.fa-spinner').parent().attr('disabled' , false);

                        }else{

                            $('.fa-spinner').css('display','none');
                            $('.fa-spinner').parent().attr('disabled' , false);


                            var errors = data.errors;
                            
                            $('#allErrorsHere').empty();
                            errors.forEach(function(value){
                                $('#allErrorsHere').fadeIn();
                                $('#allErrorsHere').append('<span>'+value+'</span><br />');
                            });
                            
                        }
                    }
                });

            });


            // Delete Category By AJAX ...
            $(document).on('click' , '#delete' , function(e){
                e.preventDefault();

                var id = $(this).data('id');
                var url =$(this).attr('href');


                if( confirm('Are You Sure ?') ){
                    $.ajax({
                        url : url ,
                        type : 'GET',
                        dataType : 'JSON',
                        data : { id : id },
                        success : function(data){
                            getAllData();
                            swal('{{ trans("backend.greatjob") }}' , '{{ trans("backend.deleted_successfully") }}' , 'success')
                        }
                    });
                }


            });


            // View Comment By AJAX ...
            $(document).on('click' , '#view' , function(e){
                e.preventDefault();


                var url = $(this).attr('href');
                var id = $(this).data('id');

                $('.showComment').modal('show');


                $.ajax({
                    url : url ,
                    type : 'GET',
                    dataType : 'JSON',
                    data : { id : id },
                    success : function(data){
                        $('#showComment').html(data.comment);
                    }
                });


            });


             // Image Preview For Create ....
            $("#sliderImage").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#sliderImagePreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
              }
            });


            // Image Preview For Edit ....
            $("#sliderImage").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#sliderImagePreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
              }
            });



        });
    </script>
   @endpush


@endsection
