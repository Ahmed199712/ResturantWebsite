@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeUserURL" data-url="{{ route('user.store') }}"></span>
<span id="getOrdersURL" data-url="{{ route('order.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.orders') }} 
        </h3>
        <div class="box-body">

                <div class="table-responsive" id="allDataHere">
                                <table id="myTable" class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Food</th>
                            <th>User</th>
                            <th>Price</th>
                            <th>Address</th>
                            <th>CreatedAt</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $index=>$order)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img style="width:50px;height:50px" src="{{ asset($order->food->image) }}">
                                </td>
                                <td>{{ $order->food->name }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->food->price }}</td>
                                <td>{{ $order->user->address }}</td>
                                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                <td>

                                    @if( $order->active == 0 )
                                        <a href="{{ route('order.active' , $order->id) }}" class="btn btn-success btn-sm"  id="active" data-id="{{ $order->id }}"> <i class="fa fa-lg fa-check"></i> Active </a>
                                    @else
                                        <a href="#" class="btn btn-success btn-sm disabled"  id="view" data-id="{{ $order->id }}"> <i class="fa fa-lg fa-check"></i> Done </a>
                                    @endif

                                    <a href="{{ route('order.show' , $order->id) }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $order->id }}" data-image="{{ asset($order->avatar) }}"> <i class="fa fa-lg fa-eye"></i> </a>
                                    <!--<a href="{{ route('order.edit' , $order->id) }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $order->id }}" data-image="{{ asset($order->avatar) }}"> <i class="fa fa-lg fa-pencil"></i> </a>-->
                                    <a href="{{ route('order.delete' , $order->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $order->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                var url = $('#getOrdersURL').data('url');

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

            getAllData();

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


           
            $(document).on('click' , '#active' , function(e){
                e.preventDefault();

                var url = $(this).attr('href');
                var id = $(this).data('id');


                if( confirm('Are You Sure to active') ){
                    $.ajax({
                        url : url ,
                        type : 'GET',
                        dataType : 'JSON',
                        data : { id : id },
                        success : function(data){
                            getAllData();
                            swal('{{ trans("backend.greatjob") }}' , '{{ trans("backend.actived_successfully") }}' , 'success')
                        }
                    });
                }



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
