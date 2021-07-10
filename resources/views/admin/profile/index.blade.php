@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeUserURL" data-url="{{ route('user.store') }}"></span>
<span id="getUsersURL" data-url="{{ route('user.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.profile') }} 
        </h3>
        <div class="box-body">

            <div class="row">

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                <div class="col-md-4">
                    <img style="width:100%;height:300px" id="profileImagePreview" class="img-thumbnail" src="{{ asset( auth()->guard('admin')->user()->avatar ) }}">
                    <input type="file" id="profileImage" name="avatar" class="form-control" style="margin-top:5px">
                </div>
                <div class="col-md-7">
                    
                        
                        @include('admin.includes.messages')


                        <div class="form-group">
                            <label>{{ trans('backend.name') }}</label>
                            <input type="text" name="name" value="{{ $admin->name }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ trans('backend.email') }}</label>
                            <input type="email" name="email" value="{{ $admin->email }}" class="form-control">
                        </div>

                         <div class="form-group">
                            <label>{{ trans('backend.password') }}</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                         <div class="form-group">
                            <label>{{ trans('backend.password_confirmation') }}</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-block"> <i class="fa fa-edit fa-lg"></i> {{ trans('backend.edit') }}</button>
                        </div>


                    
                </div>


                </form>
            </div>


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
                var url = $('#getUsersURL').data('url');

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
            $('#createUserForm').submit(function(e){
                e.preventDefault();

                var form = $(this);
                var url = $('#storeUserURL').data('url');


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
                            $('.createNewUser').modal('hide');
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


                $('.editNewUser').modal('show');
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
            $('#updateUserForm').submit(function(e){
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
                            $('.editNewUser').modal('hide');
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
            $("#profileImage").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#profileImagePreview').attr('src', e.target.result);
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



            // Notification For Success ..
            @if( session()->has('success') )
                swal('{{ trans("backend.greatjob") }}' , '{{ session()->get("success") }}' , 'success');
            @endif


        });
    </script>
   @endpush


@endsection
