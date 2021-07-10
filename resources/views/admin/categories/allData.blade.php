<table id="myTable" class="table table-hover table-striped text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>CreatedAt</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $index=>$category)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('category.edit' , $category->id) }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $category->id }}"> <i class="fa fa-lg fa-pencil"></i> </a>
                    <a href="{{ route('category.delete' , $category->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $category->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
