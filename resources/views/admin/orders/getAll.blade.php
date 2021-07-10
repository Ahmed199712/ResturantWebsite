<div class="table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Food</th>
            <th>User</th>
            <th>Price</th>
            <th>Address</th>
            <th>CreatedAt</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $index=>$order)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img style="width:50px;height:50px" src="{{ asset($order->food->image) }}">
                </td>
                <td>{{ $order->food->name }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->food->price }}</td>
                <td>{{ $order->user->address }}</td>
                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                <td>

                    @if( $order->active == 0 )
                        <a href="{{ route('order.active' , $order->id) }}" class="btn btn-success btn-sm"  id="active" data-id="{{ $order->id }}"> <i class="fa fa-lg fa-check"></i> Active </a>
                    @else
                        <a href="#" class="btn btn-success btn-sm disabled"  id="view" data-id="{{ $order->id }}"> <i class="fa fa-lg fa-check"></i> Done </a>
                    @endif

                    <a href="{{ route('order.show' , $order->id) }}" class="btn btn-info btn-sm"  id="view" data-id="{{ $order->id }}" data-image="{{ asset($order->avatar) }}"> <i class="fa fa-lg fa-eye"></i> </a>
                    <!--<a href="{{ route('order.edit' , $order->id) }}" class="btn btn-warning btn-sm"  id="edit" data-id="{{ $order->id }}" data-image="{{ asset($order->avatar) }}"> <i class="fa fa-lg fa-pencil"></i> </a>-->
                    <a href="{{ route('order.delete' , $order->id) }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $order->id }}" > <i class="fa fa-lg fa-trash"></i> </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
            </div>

           


        </div>