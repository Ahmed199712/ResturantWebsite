	@extends('admin.layouts.app')

@section('content')

<!-- Store Category URL  -->
<span id="storeCategoryURL" data-url="{{ route('category.store') }}"></span>
<span id="getCommentsURL" data-url="{{ route('comment.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.message') }} 
        </h3>
        <div class="box-body">

            

        <div class="row">
            
            <div class="col-md-2 text-center">
                <div><b>#: </b></div>
                <hr>
                <div><b>{{ trans('backend.name') }}: </b></div>
                <hr>
                <div><b>{{ trans('backend.email') }}: </b></div>
                <hr>
                <div><b>{{ trans('backend.phone') }}: </b></div>
                <hr>
                <div><b>{{ trans('backend.subject') }}: </b></div>
                <hr>
                <div><b>{{ trans('backend.message') }}: </b></div>
                <hr>
                <div><b>{{ trans('backend.actions') }}: </b></div>
            </div>

            <div class="col-md-10">
                <p>{{ $message->id }} </p>
                <hr>
                <p>{{ $message->name }} </p>
                <hr>
                <p>{{ $message->email }} </p>
                <hr>
                <p>{{ $message->phone }} </p>
                <hr>
                <p>{{ $message->subject }} </p>
                <hr>
                <p>{{ $message->message }} </p>
                <hr>
                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
            </div>

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
