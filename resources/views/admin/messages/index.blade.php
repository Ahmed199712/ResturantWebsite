	@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeCategoryURL" data-url="{{ route('category.store') }}"></span>
<span id="getCommentsURL" data-url="{{ route('comment.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.messages') }} 
        </h3>
        <div class="box-body">

            <div class="table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Message</th>
                            <th>By</th>
                            <th>Phone</th>
                            <th>CreatedAt</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $index=>$message)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ $message->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('message.show' , $message) }}" class="btn btn-info btn-sm"> <i class="fa fa-lg fa-eye"></i> </a>
                                    <a href="{{ route('message.delete' , $message->id) }}" class="btn btn-danger btn-sm"  id="newView"> <i class="fa fa-lg fa-trash"></i> </a>
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

           

            // View Comment By AJAX ...
                

            $('#newView').click(function(){
                return confirm('Are You Sure ?');
            });


            @if( Session::has('success') )
                swal( trans('backend.greatjob') , trans('backend.deleted_successfully') , 'success')
            @endif



        });
    </script>
   @endpush


@endsection
