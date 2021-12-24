<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-app-layout>

    </x-app-layout>

    <!DOCTYPE html>
    <html lang="en">
      <head>
          <base href="/public">
        <!-- Required meta tags -->
            @include('admin/admincss')
      </head>
      <body>
        <div class="container-scroller">
            @include('admin/navbar')

            <div class="container-fluid pr-5 pl-5 mt-3">
                <div class="card bg-dark">
                    <div class="card-header">
                       Order Details
                        <p class="float-right mx-5 text-primary">{{$user_name}}</p>
                    </div>

                  <div class="card-body">

                    <table class="table table-striped">
                        <tr class="text-white">
                            <th>No</th>
                            <th>Food Name</th>
                            <th>Price</th>
                            <th>quantity</th>
                        </tr>
                        <?php $i = 0; ?>
                        @foreach ($order_datails as $order)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $order->foodName }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->quantity }}</td>
                            </tr>
                        @endforeach
                    </table>

                    <a href="{{ url('orderConfirm', $user_id) }}" class="btn btn-outline-success">Order Confirm</a>
                    <a href="{{ url('orderCancel', $ordered_user_id) }}" class="btn btn-outline-danger">Order Cancel</a>

                  </div>
                </div>
              </div>
            @include('admin/adminscript')
        </div>
      </body>
    </html>

</body>
</html>
