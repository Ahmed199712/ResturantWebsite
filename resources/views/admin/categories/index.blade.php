@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeCategoryURL" data-url="{{ route('category.store') }}"></span>
<span id="getCategoriesURL" data-url="{{ route('category.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.categories') }} @if( app()->getLocale() == 'en' ) <a style="margin-left:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewCategory" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @else <a style="margin-right:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewCategory" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @endif
        </h3>
        <div class="box-body">

            <div class="table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>CreatedAt</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $index=>$category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm"  id="view" data-id="{{ $category->id }}"> <i class="fa fa-lg fa-eye"></i> </a>
                                    <a href="{{ route('category.edit' , $category->id) }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $category->id }}"> <i class="fa fa-lg fa-pencil"></i> </a>
                                    <a href="{{ route('category.delete' , $category->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $category->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('admin.categories.create')
            @include('admin.categories.edit')


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
                var url = $('#getCategoriesURL').data('url');

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

            // Create Category By AJAX ..
            $('#createCategoryForm').submit(function(e){
                e.preventDefault();

                var form = $(this);
                var url = $('#storeCategoryURL').data('url');


                $.ajax({
                    url : url ,
                    type : 'POST',
                    dataType : 'JSON',
                    data : form.serialize(),
                    beforeSend : function(){
                        $('.fa-spinner').css('display','block');
                        $('.fa-spinner').parent().attr('disabled' , 'true');
                    },
                    success : function(data){
                        if( $.isEmptyObject(data.errors) )
                        {
                            getAllData();
                            $('.createNewCategory').modal('hide');
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
                            errors.forEach(function(value , index){
                                $('#allErrorsHere').fadeIn();
                                $('#allErrorsHere').append('<span>'+value+'</span>');
                            });
                            
                        }
                    }
                });



            });



             // edit Category By AJAX ...
             $(document).on('click' , '#edit' , function(e){
                e.preventDefault();

                var url = $(this).attr('href');
                var id = $(this).data('id');


                $('.editCategory').modal('show');

                $.ajax({
                    url : url ,
                    type : 'GET',
                    dataType : 'JSON',
                    data : { id : id },
                    success : function(data){
                        $('#catID').val(data.id);
                        $('#catNameEdit').val(data.name);
                    }
                });



            });

            // Update Category By AJAX ...
            $('#updateCategoryForm').submit(function(e){
                e.preventDefault();

                var url = $(this).attr('action');

                $.ajax({
                    url : url ,
                    type : 'POST',
                    dataType : 'JSON',
                    data : $(this).serialize(),
                    beforeSend : function(){
                        $('.fa-spinner').css('display','block');
                        $('.fa-spinner').parent().attr('disabled' , 'true');
                    },
                    success : function(data){
                        if( $.isEmptyObject(data.errors) )
                        {
                            getAllData();
                            $('.editCategory').modal('hide');
                            swal('{{ trans("backend.greatjob") }}' , '{{ trans("backend.updated_successfully") }}' , 'success')

                            $('#allErrorsHere').fadeOut();
                            $('.fa-spinner').css('display','none');
                            $('.fa-spinner').parent().attr('disabled' , false);

                        }else{
                            $('.fa-spinner').css('display','none');
                            $('.fa-spinner').parent().attr('disabled' , false);


                            var errors = data.errors;
                            
                            $('#allErrorsHereEdit').empty();
                            errors.forEach(function(value){
                                $('#allErrorsHereEdit').fadeIn();
                                $('#allErrorsHereEdit').append('<span>'+value+'</span>');
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



        });
    </script>
   @endpush


@endsection
