<table id="myTable" class="table table-hover table-striped text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>CreatedAt</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $index=>$admin)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img width="30px" height="30px" src="{{ asset($admin->avatar) }}">
                </td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->phone }}</td>
                <td>{{ $admin->address }}</td>
                <td>{{ $admin->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('admin.admins.show') }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $admin->id }}" data-image="{{ asset($admin->avatar) }}"> <i class="fa fa-lg fa-eye"></i> </a>
                    <a href="{{ route('admin.admins.edit' , $admin->id) }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $admin->id }}" data-image="{{ asset($admin->avatar) }}"> <i class="fa fa-lg fa-pencil"></i> </a>
                    <a href="{{ route('admin.admins.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $admin->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>