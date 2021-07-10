@foreach( $categories as $category )
	<option value="{{ $category->id }}"
		@if( $category->id == $food->category->id )
			selected
		@endif
	> {{ $category->name }} </option>
@endforeach

