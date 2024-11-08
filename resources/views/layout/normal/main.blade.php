<!DOCTYPE html>
<html lang="en">
<head>
    @include('common.meta')
    @stack('share-meta')
    @include('common.normalcss')
    @stack('custom-css')
    <link rel="icon" type="image/x-icon" href="{{ url('/'.$webcongigData->favicone) }}">
  <!-- Google tag (gtag.js) -->

</head>

<body>
  @include('common.fbcomment')
     <div class="d-xs-block d-sm-block d-md-block d-xl-none d-xxl-none ">
        @include('layout.normal.sidebar')
     </div>


    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper active">

        @include('layout.normal.head')

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container">

          <div class="row">
            @yield('content')
          </div>

        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      @include('layout.normal.footer')
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
</body>
@include('common.normaljs')
@stack('custom-scripts')
</html>
