@extends('admin.layouts.app')

@section('content')



<!-- Store Category URL  -->
<span id="storeTestURL" data-url="{{ route('test.store') }}"></span>
<span id="getUsersURL" data-url="{{ route('user.all') }}"></span>

    <div class="box box-primary">
        <h3 class="box-header" style="margin:0">
        {{ trans('backend.tests') }} @if( app()->getLocale() == 'en' ) <a id="getCategoriesToSelectBox" style="margin-left:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewTest" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @else <a id="getCategoriesToSelectBox" style="margin-right:50px;border-radius:0;transition:.3s" href="" class="btn btn-primary" style="border-radius:0" data-toggle="modal" data-target=".createNewTest" > <i class="fa fa-plus fa-lg fa-fw"></i> {{ trans('backend.addnew') }} </a> @endif
        </h3>
        <div class="box-body">

            <div class="table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>CreatedAt</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tests as $index=>$test)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img width="30px" height="30px" src="{{ asset($user->avatar) }}">
                                </td>
                                <td>{{ $test->name }}</td>
                                <td>{{ $test->price }}</td>
                                <td>{{ $test->image }}</td>
                                <td>{{ $test->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('test.show') }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $test->id }}" data-image="{{ asset($test->avatar) }}"> <i class="fa fa-lg fa-eye"></i> </a>
                                    <a href="{{ route('test.edit' , $test->id) }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $test->id }}" data-image="{{ asset($test->avatar) }}"> <i class="fa fa-lg fa-pencil"></i> </a>
                                    <a href="{{ route('test.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $test->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('admin.tests.create')



        </div>
    </div>



    <!-- The Script Of The Page -->
   @push('scripts')
   <script>
        $(document).ready(function(){


            // Store Data By AJAX ...
            $('#createTestForm').submit(function(e){
                e.preventDefault();

                var url = $(this).attr('action');

                $.ajax({
                    url : url ,
                    type : 'POST',
                    dataType : 'JSON',
                    success : function(data){
                        
                    },
                    error : function(data){

                        if( $.isEmptyObject(data.responseJSON) ){
                             $.each(data.responseJSON , function(index , value){
                                $("input[name='"+index+"']").css('border','');
                                $("input[name='"+index+"']").after('');
                            });
                        }else{

                           

                            $.each(data.responseJSON , function(index , value){
                                $("input[name='"+index+"']").css('border','1px solid red');
                                $("input[name='"+index+"']").after('<span class="text-danger">'+value+'</span>');
                                $("input[name='"+index+"']").css('border','');
                                $("input[name='"+index+"']").after('');
                            });




                        }

                    }
                });



            });

            

             // Image Preview For Create ....
             $("#testImage").change(function() {
              if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  $('#testImagePreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
              }
            });



        });
    </script>
   @endpush


@endsection
