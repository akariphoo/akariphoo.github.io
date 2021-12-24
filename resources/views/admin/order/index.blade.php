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
                        Orders
                        <div class="col-4 float-right">
                        <form action="{{ url('search') }}" method="POST">
                            @csrf
                            <input type="text" name="search" class="btn btn-secondary">
                            <button type="submit" class="btn btn-primary">
                            <span class="fas fa-search"></span>
                            </button>
                        </form>
                        </div>
                    </div>

                  <div class="card-body">

                    <table class="table table-striped">
                        <tr class="text-white">
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Details</th>
                        </tr>
                        <?php $i = 0; ?>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>
                                    <a href="{{ url('orderDetail', $order->id) }}" class="text-primary">Detail...</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>


                  </div>
                </div>
              </div>
            @include('admin/adminscript')
        </div>
      </body>
    </html>

</body>
</html>
