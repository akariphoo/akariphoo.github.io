<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                        <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            <li class="scroll-to-section">
                                @auth
                                <a href="{{ url('showCart', Auth::user()->id) }}">
                                    Cart[{{ $count }}]
                                </a>
                                @endauth

                                @guest
                                    Cart[0]
                                @endguest
                            </li>

                            @if (Route::has('login'))
                            <li><div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                   <li>

                                    <x-app-layout>

                                    </x-app-layout>


                                   </li>
                                @else
                                   <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                                    @if (Route::has('register'))
                                     <li>  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                    @endif
                                @endauth
                            </div>
                        </li>
                            @endif

                        </ul>

                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>


        <div id="top">
            <div class="container-fluid pr-5 pl-5 mt-3">
                <div class="row">
                    <div class="col-6 mx-auto d-block">
                        <div class="card">
                            <div class="card-header" style="font-color: black; font-weight:bold;">
                                My Cart
                            </div>

                          <div class="card-body">

                            <table class="table table-striped">
                                <tr>
                                    <th>Food Name</th>
                                    <th>quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>

                             <form action="{{ url('orderConfirm') }}" method="post">
                                    @csrf
                                <?php $total_price = 0; ?>
                                @foreach ($foods as $food)
                                    <tr>
                                        <input type="text" name="foodName[]" value="{{ $food->title }}" hidden="">
                                        <td>{{ $food->title }}</td>
                                        <input type="text" name="quantity[]" value="{{ $food->quantity }}" hidden="">
                                        <td>{{ $food->quantity }}</td>
                                        <input type="text" name="price[]" value="{{ $food->price }}" hidden="">
                                        <td>{{ $food->price }}</td>
                                        <td><a href="{{ url('/removeFromCart', $food->id) }}" class="btn btn-sm btn-danger">Remove</a></td>
                                    </tr>
                                <?php $total_price += $food->quantity * $food->price; ?>
                                @endforeach
                                <tr>
                                    <td colspan="2" style="font-color: black; font-weight:bold;" class="text-center">Total</td>
                                    <td colspan="2" style="font-color: black; font-weight:bold;">{{ $total_price }}</td>
                                </tr>
                            </table>
                          </div>
                        </div>
                        <div class="mt-2" style="text-align: center;">
                            <a class="btn btn-success" id="order">Order</a>
                        </div>


                    </div>

                    <div class="col-6" style="display: none;" id="orderConfirm">
                        <div class="form-group">
                            <label for="" style="font-color: black; font-weight:bold;">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" style="font-color: black; font-weight:bold;">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" style="font-color: black; font-weight:bold;">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="" style="text-align:center;">
                            <button class="btn btn-success" onclick="return alert('Thank you for your order!!');" id="Confirm">Order Confirm</button>
                            <button class="btn btn-danger" id="cancel">Cancel</button>
                        </div>
                    </div>
                </form>
                </div>
              </div>
        </div>

        <script type="text/javascript">
            $('#order').click(
                function() {
                    $('#orderConfirm').show();
                }
            );

            $('#cancel').click ({
                function() {
                    $('#orderConfirm').hide();
                }
            })

        </script>

    <!-- ***** Header Area End ***** -->
<!-- jQuery -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/isotope.js"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>
<script>

    $(function() {
        var selectedClass = "";
        $("p").click(function(){
        selectedClass = $(this).attr("data-rel");
        $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("."+selectedClass).fadeOut();
        setTimeout(function() {
          $("."+selectedClass).fadeIn();
          $("#portfolio").fadeTo(50, 1);
        }, 500);

        });
    });

</script>
</body>
</html>
