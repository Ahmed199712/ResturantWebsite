<table id="myTable" class="table table-hover table-striped text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Comment</th>
                            <th>On</th>
                            <th>By</th>
                            <th>CreatedAt</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $index=>$comment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->food->name }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ $comment->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('comment.show') }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $comment->id }}"> <i class="fa fa-lg fa-eye"></i> </a>
                                    <a href="{{ route('comment.delete' , $comment->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $comment->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>