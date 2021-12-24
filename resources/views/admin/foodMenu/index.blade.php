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
                        Food Menus
                        <a href="{{ url('createFoodMenu') }}" class="float-right mx-5">Create Meu</a>
                    </div>

                  <div class="card-body">

                    <table class="table table-striped">
                        <tr class="text-white">
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th colspan="2">Option</th>
                        </tr>
                        <?php $i = 0; ?>
                        @foreach ($foods as $food)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><img src="images/foodimages/{{ $food->image }}"  height="200" width="200"></td>
                                <td>{{ $food->title }}</td>
                                <td>{{ $food->price }}</td>
                                <td>{{ $food->description }}</td>
                                <td>
                                    <a href="{{ url('deleteFoodMenu', $food->id) }}" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></a>
                                    <a href="{{ url('updateViewFoodMenu', $food->id) }}" class="btn btn-sm btn-warning"><span class="fas fa-edit"></span></a>
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
