@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeFoodURL" data-url="{{ route('food.store') }}"></span>
<span id="getFoodsURL" data-url="{{ route('food.all') }}"></span>
<span id="getCategoriesURL" data-url="{{ route('food.category.all') }}"></span>
<span id="getCategoryNameURL" data-url="{{ route('food.category.name') }}"></span>
<span id="getCategorySelectedURL" data-url="{{ route('food.category.selected') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.foods') }} @if( app()->getLocale() == 'en' ) <a id="getCategoriesToSelectBox" style="margin-left:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewFood" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @else <a id="getCategoriesToSelectBox" style="margin-right:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewFood" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @endif
        </h3>
        <div class="box-body">

            <div class="table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('backend.image') }}</th>
                            <th>{{ trans('backend.name') }}</th>
                            <th>{{ trans('backend.category') }}</th>
                            <th>{{ trans('backend.price') }}</th>
                            <th>{{ trans('backend.discount') }}</th>
                            <th>{{ trans('backend.created_at') }}</th>
                            <th>{{ trans('backend.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foods as $index=>$food)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img width="40px" height="40px" src="{{ asset($food->image) }}">
                                </td>
                                <td>{{ $food->name }}</td>
                                <td>{{ $food->category->name }}</td>
                                <td>{{ $food->price }}</td>
                                <td>{{ $food->discount }}</td>
                                <td>{{ $food->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('food.show') }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $food->id }}" data-image="{{ asset($food->image) }}"> <i class="fa fa-lg fa-eye"></i> </a>
                                    <a href="{{ route('food.edit') }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $food->id }}" data-image="{{ asset($food->image) }}"> <i class="fa fa-lg fa-pencil"></i> </a>
                                    <a href="{{ route('food.delete' , $food->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $food->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('admin.foods.create')
            @include('admin.foods.edit')
            @include('admin.foods.show')


        </div>
    </div>



    <!-- The Script Of The Page -->
   @push('scripts')
   <script>
        $(document).ready(function(){

            // Get All Categories To Select Box ..
            $('#getCategoriesToSelectBox').click(function(){

                var url = $('#getCategoriesURL').data('url');
                $.ajax({
                    url : url ,
                    type : 'GET',
                    dataType : 'HTML',
                    success : function(data){
                        $('#getCategories').html(data);
                    }
                });
            });



            // Function To Get All Data ...
            function getAllData(){
                var url = $('#getFoodsURL').data('url');
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



            // Create food By AJAX ..
            $('#createFoodForm').submit(function(e){
                e.preventDefault();

                var form = $(this);
                var url = $('#storeFoodURL').data('url');


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
                    success : function(data){

                        if( $.isEmptyObject(data.errors) )
                        {
                            getAllData();
                            $('.createNewFood').modal('hide');
                            form[0].reset();
                            swal('{{ trans("backend.greatjob") }}' , '{{ trans("backend.created_successfully") }}' , 'success')

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
                                $('#allErrorsHere').append('<span>'+value+'</span><br/>');
                            });
                            
                        }


                    },
                    error : function(data){
                        var errors = data.responseJSON.errors;
                        
                    }
                });



            });



             // edit Category By AJAX ...
             $(document).on('click' , '#edit' , function(e){
                e.preventDefault();

                var url = $(this).attr('href');
                var id = $(this).data('id');
                var image = $(this).data('image');



                $('.editFood').modal('show');

                getCategorySelected(id);
                $('#foodImageEditPreview').attr('src' , image);

                $.ajax({
                    url : url ,
                    type : 'GET',
                    dataType : 'JSON',
                    data : { id : id },
                    success : function(data){
                        $('#foodID').val(data.id);
                        
                        $('#editFoodName').val(data.name);
                        $('#editFoodPrice').val(data.price);
                        $('#editFoodDiscount').val(data.discount);
                        $('#editFoodDesc').val(data.desc);


                    }
                });



            });

            // Update Category By AJAX ...
            $('#editFoodForm').submit(function(e){
                e.preventDefault();

                var form = $(this);
                var url = $(this).attr('action');
                var id = $('#foodID').val();

                
                $.ajax({
                    url : url ,
                    type : 'POST',
                    dataType : 'JSON',
                    processData : false,
                    contentType : false,
                    data : new FormData(this),
                    success : function(data){

                       if( $.isEmptyObject(data.errors) )
                        {
                            getAllData();
                            $('.editFood').modal('hide');
                            form[0].reset();
                            swal('{{ trans("backend.greatjob") }}' , '{{ trans("backend.updated_successfully") }}' , 'success')

                            $('#allErrorsHereUpdate').fadeOut();
                            $('.fa-spinner.food').css('display','none');
                            $('.fa-spinner.food').parent().attr('disabled' , false);

                        }else{

                            $('.fa-spinner.food').css('display','none');
                            $('.fa-spinner.food').parent().attr('disabled' , false);


                            var errors = data.errors;
                            $('#allErrorsHereUpdate').empty();
                            errors.forEach(function(value){
                                $('#allErrorsHereUpdate').fadeIn();
                                $('#allErrorsHereUpdate').append('<span>'+value+'</span><br/>');
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

            // Show Food By AJAX ...
            $(document).on('click' , '#view' , function(e){
                e.preventDefault();

                var url = $(this).attr('href');
                var id = $(this).data('id');
                var image = $(this).data('image');

                $('.showFoods').modal('show');
                $('#showFoodImage').attr('src' , image);
                getCategoryName(id);

                $.ajax({
                    url : url ,
                    type : 'GET',
                    dataType : 'JSON',
                    data : { id : id },
                    success : function(data){
                        $('#showName').html(data.name);
                        $('#showPrice').html(data.price);
                        $('#showDiscount').html(data.discount);
                        $('#showDesc').html(data.desc);
                        $('#showName').html(data.name);
                        $('#showFoodImage').html();
                    }
                });


            });


            // Function To Get Category Name ..
            function getCategoryName(id)
            {
                var url = $('#getCategoryNameURL').data('url');
                var id = id;

                $.ajax({
                    url : url , 
                    type : 'GET',
                    dataType : 'HTML',
                    data : { id : id },
                    success : function(data){
                        $('#showCategory').html(data);
                    }
                });
                
            }


            // Get Selected Category ...
            function getCategorySelected(id)
            {
                var url = $('#getCategorySelectedURL').data('url');
                var id = id;

                $.ajax({
                    url : url ,
                    type : 'GET',
                    dataType : 'HTML',
                    data : { id : id },
                    success : function(data){
                        $('#getCategoriesSelected').html(data);
                    }
                });


            }

            


            // Image Preview For Create ....
            $("#foodImage").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#foodImagePreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
              }
            });


            // Image Preview For Edit ....
            $("#foodImageEdit").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#foodImageEditPreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
              }
            });










        });
    </script>
   @endpush


@endsection
