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
                    <div class="card-header">Update Food Menus</div>
                  <div class="card-body">
                    <form action="{{ url('updateFoodMenu', $food->id) }}" method="POST" class="mt-3" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="Enter name">Enter Title</label>
                            <input type="text" name="title" value="{{ $food->title }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Enter name">Enter Price</label>
                            <input type="number" name="price" value="{{ $food->price }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Enter name">Choose Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="images/foodimages/{{ $food->image }}" class="rounded" width="90">
                        </div>
                        <div class="form-group">
                            <label for="Enter name">Enter Description</label>
                            <input type="text" name="description" value="{{ $food->description }}" class="form-control" required>
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
