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
        @foreach($users as $index=>$user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img width="30px" height="30px" src="{{ asset($user->avatar) }}">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('user.show') }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $user->id }}" data-image="{{ asset($user->avatar) }}"> <i class="fa fa-lg fa-eye"></i> </a>
                    <a href="{{ route('user.edit' , $user->id) }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $user->id }}" data-image="{{ asset($user->avatar) }}"> <i class="fa fa-lg fa-pencil"></i> </a>
                    <a href="{{ route('user.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $user->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>