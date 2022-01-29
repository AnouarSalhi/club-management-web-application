<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Flame</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Flamme</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="{{route('home')}}">Home</a></li>
    
          <li><a class="nav-link scrollto" href="">Welcome {{ Auth::user()->name }}</a></li>
         @if (Auth::user()->isAdmin)
                       <li><a class="nav-link scrollto active" href="">Admin Dashboard</a></li>

         @endif

        
          <li><a class="" href="{{ route('workshop') }}">Workshop events</a></li>
          
            
          </li>
          <li><form method="post" action="{{ route('logout') }}">
            @csrf
            <input class="getstarted scrollto"  type="submit" value="Log out" style="border:none ;">
              </form></li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs" style="background: #fff7e7">
     

        <ol>
          <li><a style="color: black">Home</a></li>
         
          <li style="color: black">Admin Dashboard</li>
        </ol>
      

      
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
   
    <div class="container" style="margin-top: 20px">
      <div class="row">
        @isset($messages)
<div class="col-md-12">
          <h4><b><a style="color: black" href="{{route('dashboard')}}">All users  /</a>  <a style="color:orange" href="{{route('dashboard2')}}">All Messages</a></b></h4>
         <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Messages</th>
            </tr>
          </thead>
          <tbody>
            @php
              $cnt = 0
            @endphp
            
            @foreach ($messages as $user)
            
                <tr>
                    <th scope="row">{{$cnt++}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->message}}</td>
                    
            </tr>
            @endforeach
            
          
          </tbody>
        </table>
        <div class="blog-pagination">
          <ul class="justify-content-center">
            {!! $messages->render()!!}
          </ul>
        </div>
        </div>

        @endisset
        @isset($users)
<div class="col-md-12">
  <h4><b><a style="color: orange" href="{{route('dashboard')}}">All users  /</a>  <a style="color:black" href="{{route('dashboard2')}}">All Messages</a></b></h4>
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Statue</th>
                <th scope="col">modify</th>
                <th scope="col">Delete user</th>
              </tr>
            </thead>
            <tbody>
              @php
                $cnt = 0
              @endphp
              
              @foreach ($users as $user)
              
                  <tr>
                      <th scope="row">{{$cnt++}}</th>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>@if ($user->isAdmin)
                       Admin    
                   @else
                       No
                   @endif</td>
                   @if ($user->isAdmin)
                     <td><a class="btn btn-danger" href="{{route('Admin',$user->id)}}">Dimiss as admin</a></td>
                   @else
                   <td><a class="btn btn-primary" href="{{route('Admin',$user->id)}}">Make site admin   </a></td>
                   @endif
                   <td><a class="btn btn-primary" href="{{route('removeUser',$user->id)}}">Delete user  </a></td>
              </tr>
              
              @endforeach
              
            
            </tbody>
          </table>
          <div class="blog-pagination">
            <ul class="justify-content-center">
              {!! $users->render()!!}
            </ul>
          </div>
        </div>
       
      </div>
    </div>
        @endisset
        
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>