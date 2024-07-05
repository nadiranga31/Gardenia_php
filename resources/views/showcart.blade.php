<!DOCTYPE html>
<html lang="en">

  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Garrdenia Restaurant</title>

      <!-- Favicon -->
      <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    </head>

    <body>


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ url('redirects') }}" >Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>


                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>


                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            <li class="scroll-to-section" >

                                @auth

                                <a href="{{ url('/showcart',Auth::user()->id) }}" class="active">
                                Cart[{{$count }}]
                            </a>
                                @endauth

                                @guest
                                Cart[0]
                                @endguest

                         </li>


                            <li>
                            @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                @auth
                                  <li>
                                <x-app-layout>

                                  </x-app-layout>
                                  </li>
                                @else
                                <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> </li>

                                    @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> </li>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </li>
                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </header>


<!-- component -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<section class="h-screen bg-gray-100 px-4 text-gray-600 antialiased" x-data="app">
    <div class="flex h-full flex-col justify-center">
        <!-- Table -->
        <div class="mx-auto w-full max-w-2xl rounded-sm border border-gray-200 bg-white shadow-lg">
            <header class="border-b border-gray-100 px-5 py-4">
                <div class="font-semibold text-gray-800">Manage Carts</div>
            </header>

            <div class="overflow-x-auto p-3">
                <form action="{{ url('orderconfirm') }}" method="post">
                    @csrf
                    <table class="w-full table-auto">
                        <thead class="bg-gray-50 text-xs font-semibold uppercase text-gray-400">
                            <tr>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Food Name</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold"></div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Quantity</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-left font-semibold">Price</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-center font-semibold">Action</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100 text-sm">
                            @foreach ($data as $data )
                            <tr>
                                <td class="p-2">
                                    <input type="text" name="foodname[]" id="" value="{{ $data->title }}" hidden>
                                    <div class="font-medium text-gray-800">{{ $data->title }}</div>
                                </td>
                                <td class="px-9 py-4 w-56">
                                    <img class="img-fluid" src="/foodimage/{{ $data->image }}">
                                </td>
                                <td class="p-2">
                                    <input type="text" name="quantity[]" id="" value="{{ $data->quantity }}" hidden>
                                    <div class="text-left">{{ $data->quantity }}</div>
                                </td>
                                <td class="p-2">
                                    <input type="text" name="price[]" id="" value="{{ $data->price }}" hidden>
                                    <div class="text-left font-medium text-green-500">{{ $data->price }}</div>
                                </td>
                                <td class="p-2">
                                    <div class="flex justify-center">
                                        <!-- Spacer to align with delete button -->
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            @foreach($data2 as $data2 )
                            <tr>
                                <td colspan="5" class="p-2">
                                    <div class="flex justify-end">
                                        <a href="{{ url('/remove',$data2->id) }}">
                                            <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div align="center" style="padding: 10px;">
                        <button class="btn btn-primary" id="order" type="button">
                            Order Now
                        </button>
                    </div>

                    <div id="appear" align="center" style="padding: 10px; display:none; overflow-y: auto; max-height: 400px;">
                        <div style="padding: 10px;">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" required>
                        </div>

                        <div style="padding: 10px;">
                            <label>Phone</label>
                            <input type="number" name="phone" placeholder="Phone Number" required>
                        </div>

                        <div style="padding: 10px;">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Address" required>
                        </div>

                        <div style="padding: 10px;">
                            <input type="submit" class="btn btn-success" value="Order Confirm">
                            {{-- <a href="" class="btn btn-outline-secondary" onclick=" return confirm('Are you sure to accept this post?')">Accept</a> --}}
                            <button id="close" type="button" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- <script type="text/javascript">

    function confirmation(ev)

    {
        ev.preventDefault();

        var urlToRedirect=ev.currentTarget.getAttribute('href');

        console.log(urlToRedirect)
        swal(
            {
                title:"Are you Sure to Order this ?",

                text:"You won't be able to revert this dalete",

                icon:"done",

                buttons : true,

                dangerMode : true,
            }
        )

        .then((willCancel)=>{
            if(willCancel)
            {
                window.location.href=urlToRedirect;
            }
        });
    }

    </script> --}}


    <script type="text/javascript">

        $("#order").click(

        function(){
            $("#appear").show();
        }
        );


        $("#close").click(

        function(){
            $("#appear").hide();
        }
        );

    </script>





  </body>
</html>
