<table id="myTable" class="table table-hover table-striped text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sliders as $index=>$slider)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img style="width:150px;height:150px" src="{{ asset($slider->image) }}">
                </td>
                <td>{{ $slider->name }}</td>
                <td>{{ $slider->desc }}</td>
                <td>
                    
                    <a href="{{ route('slider.delete' , $slider->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $slider->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>