@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeAdminsURL" data-url="{{ route('admin.admins.store') }}"></span>
<span id="getAdminsURL" data-url="{{ route('admin.admins.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.admins') }} @if( app()->getLocale() == 'en' ) <a id="getCategoriesToSelectBox" style="margin-left:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewAdmin" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @else <a id="getCategoriesToSelectBox" style="margin-right:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewAdmin" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @endif
        </h3>
        <div class="box-body">

            <div class="table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>CreatedAt</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $index=>$admin)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img width="30px" height="30px" src="{{ asset($admin->avatar) }}">
                                </td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>{{ $admin->address }}</td>
                                <td>{{ $admin->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.admins.show') }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $admin->id }}" data-image="{{ asset($admin->avatar) }}"> <i class="fa fa-lg fa-eye"></i> </a>
                                    <a href="{{ route('admin.admins.edit' , $admin->id) }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $admin->id }}" data-image="{{ asset($admin->avatar) }}"> <i class="fa fa-lg fa-pencil"></i> </a>
                                    <a href="{{ route('admin.admins.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $admin->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('admin.admins.create')
            @include('admin.admins.edit')
            @include('admin.admins.show')


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
                var url = $('#getAdminsURL').data('url');

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
            $('#createAdminForm').submit(function(e){
                e.preventDefault();

                var form = $(this);
                var url = $('#storeAdminsURL').data('url');


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
                            $('.createNewAdmin').modal('hide');
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
                                $('#allErrorsHere').append('<span>'+value+'</span><br />');
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
                var image = $(this).data('image');


                $('.editNewAdmin').modal('show');
                $('#userImagePreviewEdit').attr('src' , image);



                $.ajax({
                    url : url ,
                    type : 'GET',
                    dataType : 'JSON',
                    data : { id : id },
                    success : function(data){
                        $('#userID').val(data.id);
                        
                        $('#userName').val(data.name);
                        $('#userEmail').val(data.email);
                        $('#userPhone').val(data.phone);
                        $('#userAddress').val(data.address);

                    }
                });



            });

            // Update Category By AJAX ...
            $('#updateAdminForm').submit(function(e){
                e.preventDefault();

                var url = $(this).attr('action');

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
                            $('.editNewAdmin').modal('hide');
                            swal('{{ trans("backend.greatjob") }}' , '{{ trans("backend.updated_successfully") }}' , 'success')

                            $('#allErrorsHereUpdate').fadeOut();
                            $('.fa-spinner').css('display','none');
                            $('.fa-spinner').parent().attr('disabled' , false);

                        }else{
                            $('.fa-spinner').css('display','none');
                            $('.fa-spinner').parent().attr('disabled' , false);


                            var errors = data.errors;
                            
                            $('#allErrorsHereUpdate').empty();
                            errors.forEach(function(value){
                                $('#allErrorsHereUpdate').fadeIn();
                                $('#allErrorsHereUpdate').append('<span>'+value+'</span><br />');
                            });

                        }

                        console.log(data);
                    }
                });


            });


            // View User By AJAX ...
            $(document).on('click' , '#view' , function(e){
                e.preventDefault();

                var url = $(this).attr('href');
                var id = $(this).data('id');
                var image = $(this).data('image');

                $('.viewNewUser').modal('show');
                $('#showUserImage').attr('src' , image);

                $.ajax({
                    url : url ,
                    type : 'GET',
                    dataType : 'JSON',
                    data : { id : id },
                    success : function(data){
                        $('#showName').html(data.name);
                        $('#showEmail').html(data.email);
                        $('#showPhone').html(data.phone);
                        $('#showAddress').html(data.address);
                        console.log(data);
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






             // Image Preview For Create ....
            $("#userImage").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#userImagePreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
              }
            });


            // Image Preview For Edit ....
            $("#userImageEdit").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#userImagePreviewEdit').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
              }
            });



        });
    </script>
   @endpush


@endsection
