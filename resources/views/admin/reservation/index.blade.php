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
                        Reservations
                        <div class="col-4 float-right">
                            <form action="{{ url('searchDate') }}" method="POST">
                                @csrf
                                <div id="filterDate2">
                                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                                      <input  name="date" id="date" type="text" class="btn btn-secondary" placeholder="dd/mm/yyyy">
                                      <div class="input-group-addon" >
                                        <span class="glyphicon glyphicon-th"></span>
                                      </div>
                                      <button type="submit" class="btn btn-primary float-right">
                                        <span class="fas fa-search"></span>
                                        </button>
                                    </div>
                                  </div>


                            </form>
                        </div>
                    </div>

                  <div class="card-body">
                    <table class="table table-striped">
                        <tr class="text-white">
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Number of Guest</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message</th>
                        </tr>
                        <?php $i = 0; ?>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->phone }}</td>
                                <td>{{ $reservation->guest }}</td>
                                <td>{{ $reservation->date }}</td>
                                <td>{{ $reservation->time }}</td>
                                <td>{{ $reservation->message }}</td>
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
