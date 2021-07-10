@if( $errors->any() )
    <div class="alert alert-danger">
        @foreach( $errors->all() as $error )
            <span> {{ $error }} </span> <br>
        @endforeach
    </div>
@endif

@if( session()->has('errorLogin') )
    <div class="alert alert-danger">
        <span> {{ session()->get('errorLogin') }} </span>
    </div>
@endif


