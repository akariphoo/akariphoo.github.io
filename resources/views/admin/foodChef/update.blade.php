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
        <base href="/public">
            @include('admin/admincss')
      </head>
      <body>
        <div class="container-scroller">
            @include('admin/navbar')

            <div class="container-fluid pr-5 pl-5 mt-3">
                <div class="card bg-dark">
                    <div class="card-header">Chefs </div>
                  <div class="card-body">

                        <form action="{{ url('/updateFoodChef', $chef->id) }}" method="POST" class="mt-3" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="Enter name">Enter Name</label>
                                <input type="text" name="name" value="{{ $chef->name }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Enter name">Enter Speciality</label>
                                <input type="text" name="speciality" value="{{ $chef->speciality }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Enter name">Choose Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="images/chefImages/{{ $chef->image }}" width="100" height="100">
                            </div>

                            <input type="submit" value="Update" class="btn btn-outline-success">
                        </form>

                  </div>
                </div>
              </div>
            @include('admin/adminscript')
        </div>
      </body>
    </html>

</body>
</html>
