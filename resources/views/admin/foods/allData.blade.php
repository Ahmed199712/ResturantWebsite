<table id="myTable" class="table table-hover table-striped text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('backend.image') }}</th>
            <th>{{ trans('backend.name') }}</th>
            <th>{{ trans('backend.category') }}</th>
            <th>{{ trans('backend.price') }}</th>
            <th>{{ trans('backend.discount') }}</th>
            <th>{{ trans('backend.created_at') }}</th>
            <th>{{ trans('backend.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($foods as $index=>$food)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img width="40px" height="40px" src="{{ asset($food->image) }}">
                </td>
                <td>{{ $food->name }}</td>
                <td>{{ $food->category->name }}</td>
                <td>{{ $food->price }}</td>
                <td>{{ $food->discount }}</td>
                <td>{{ $food->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('food.show') }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $food->id }}" data-image="{{ asset($food->image) }}"> <i class="fa fa-lg fa-eye"></i> </a>
                    <a href="{{ route('food.edit') }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $food->id }}" data-image="{{ asset($food->image) }}"> <i class="fa fa-lg fa-pencil"></i> </a>
                    <a href="{{ route('food.delete' , $food->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $food->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>