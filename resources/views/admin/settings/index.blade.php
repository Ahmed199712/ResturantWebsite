@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeUserURL" data-url="{{ route('user.store') }}"></span>
<span id="getUsersURL" data-url="{{ route('user.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.settings') }} 
        </h3>
        <div class="box-body">

            <div class="row">

            
                    
                    <div class="col-md-3 col-md-offset-1">
                        <div class="form-group text-center">
                            <label>{{ trans('backend.comments') }}</label><br>
                            @if($settings->first()->stop_comments == 0)
                                <a id="openComments" href="{{ route('setting.stopComments') }}" class="btn btn-danger btn-block"> <i class="fa fa-close fa-lg fa-fw"></i> {{ trans('backend.stopcomments') }} </a>
                            @else
                                <a id="openComments" href="{{ route('setting.stopComments') }}" class="btn btn-success btn-block"> <i class="fa fa-reply fa-lg fa-fw"></i> {{ trans('backend.opencomments') }}</a>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3 col-md-offset-1">
                        <div class="form-group text-center">
                            <label>{{ trans('backend.register') }}</label> <br>
                            @if($settings->first()->stop_register == 0)
                                <a id="openRegisters" href="{{ route('setting.stopRegisters') }}" class="btn btn-danger btn-block"> <i class="fa fa-close fa-lg fa-fw"></i> {{ trans('backend.stopregisters') }}</a>
                            @else
                                <a id="openRegisters" href="{{ route('setting.stopRegisters') }}" class="btn btn-success btn-block"> <i class="fa fa-reply fa-lg fa-fw"></i> {{ trans('backend.openregisters') }} </a>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3 col-md-offset-1">
                        <div class="form-group text-center">
                            <label>{{ trans('backend.mainwebsite') }}</label><br>
                            @if($settings->first()->stop_website == 0)
                                <a id="openWebsite" href="{{ route('setting.stopWebsite') }}" class="btn btn-danger btn-block"> <i class="fa fa-close fa-lg fa-fw"></i> {{ trans('backend.stopwebsite') }} </a>
                            @else
                                <a id="openWebsite" href="{{ route('setting.stopWebsite') }}" class="btn btn-success btn-block"> <i class="fa fa-reply fa-lg fa-fw"></i> {{ trans('backend.openwebsite') }}</a>
                            @endif
                        </div>
                    </div>

                    <br><br><br><br><hr>

               <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ trans('backend.name') }}</label>
                            <input type="text" name="name" value="{{ $settings->first()->website_name }}" class="form-control">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ trans('backend.email') }}</label>
                            <input type="email" name="email" value="{{ $settings->first()->website_email }}"  class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ trans('backend.phone') }}</label>
                            <input type="number" name="phone" value="{{ $settings->first()->website_phone }}"  class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ trans('backend.address') }}</label>
                            <input type="text" name="address" value="{{ $settings->first()->website_address }}"  class="form-control">
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ trans('backend.desc') }}</label>
                            <textarea name="desc" class="form-control" rows="7">{{ $settings->first()->website_desc }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{ trans('backend.logo') }}</label>
                            <input id="websiteLogo" type="file" name="logo" class="form-control">
                            <img id="websiteLogoPreview" style="width:115px;height:115px;margin-top: 5px" class="img-thumbnail" src="{{ asset($settings->first()->website_logo) }}">
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block">Save</button>
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
            $("#websiteLogo").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#websiteLogoPreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
              }
            });





            // Notification For Success ..
            @if( session()->has('success') )
                swal('{{ trans("backend.greatjob") }}' , '{{ session()->get("success") }}' , 'success');
            @endif


            // Confirm Message ..
            $('#openComments').click(function(){
                return confirm("Are You Sure ?");
            });

             // Confirm Message ..
            $('#openRegisters').click(function(){
                return confirm("Are You Sure ?");
            });

              // Confirm Message ..
            $('#openWebsite').click(function(){
                return confirm("Are You Sure ?");
            });


        });
    </script>
   @endpush


@endsection
