<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ url('/'.$webcongigData->favicone) }}">
    <title>শতাব্দীর বার্তা | বাংলা নিউজ পেপার | বাংলা খবরের কাগজ</title>

    @include('common.admincss')

    @stack('sub_page_styles')

    <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-S3ZFWS2EKB"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-S3ZFWS2EKB');
  </script>

</head>
<body>
     @include('common.fbcomment')
    @include('layout.admin.sidebar')

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">

        @include('layout.admin.head')

      <!-- ========== section start ========== -->
      <section class="section">

        <div class="container-fluid">
          @include('layout.admin.breadcrumb')

            <div class="row">
              @yield('content')
            </div>
         <input type="hidden" id="export" value="{{ $webcongigData->logotext }}"/>
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      @include('layout.admin.footer')
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
</body>
@include('common.adminjs')

@yield('subpagejs')
@yield('pagepartjs')
@stack('sub_page_js')


</html>
