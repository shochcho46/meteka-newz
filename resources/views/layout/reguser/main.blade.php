<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('common.admincss')

   
</head>
<body>
     
    @include('layout.reguser.sidebar')

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
     
        @include('layout.reguser.head')

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          @include('layout.reguser.breadcrumb')
          <div class="row">
            @yield('content')
          </div>

        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      @include('layout.reguser.footer')
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
</body>
@include('common.adminjs')
</html>