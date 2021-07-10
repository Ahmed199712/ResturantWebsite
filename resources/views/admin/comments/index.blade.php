@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeCategoryURL" data-url="{{ route('category.store') }}"></span>
<span id="getCommentsURL" data-url="{{ route('comment.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.comments') }} 
        </h3>
        <div class="box-body">

            <div class="table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Comment</th>
                            <th>On</th>
                            <th>By</th>
                            <th>CreatedAt</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $index=>$comment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->food->name }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <!--<a href="{{ route('comment.show') }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $comment->id }}"> <i class="fa fa-lg fa-eye"></i> </a>-->
                                    <a href="{{ route('comment.delete' , $comment->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $comment->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            @include('admin.comments.show')


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
                var url = $('#getCommentsURL').data('url');

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



        });
    </script>
   @endpush


@endsection
