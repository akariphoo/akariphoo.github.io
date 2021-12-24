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
        <!-- Required meta tags -->
            @include('admin/admincss')
      </head>
      <body>
        <div class="container-scroller">
            @include('admin/navbar')

                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card bg-dark">
                                <div class="card-header">
                                    Users
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr class="text-white">
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php $i = 0; ?>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                @if ($user->userType == "0")
                                                    <td>
                                                        <a href="{{ url('/deleteUser', $user->id) }}" class="btn btn-sm btn-danger"><span class="fas fa-trash"></a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="" class="text-danger">Not Allowed</a>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach

                                    </table>
                                </div></div></div></div></div>
            @include('admin/adminscript')
        </div>
      </body>
    </html>

</body>
</html>
