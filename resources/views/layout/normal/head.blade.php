<!-- ========== header start ========== -->

<div class="container">
<div class="d-none d-xl-block d-xxl-block ">
  <div class="row mt-2 mb-1">

    <div class="col-4">
      <div class="row">
        <div class=" text-center">
          <a href ="#">
            <img src="{{ url('/'.$webcongigData->logo) }}" class="img-fluid" alt="amader protidin">
          </a>
        </div>

      </div>

      <div class="row">
        <div class="text-center">
          <span><strong>{{ $date['bangla'] }}</strong></span> -
          <span><strong>{{  $date['banglish'] }}</strong></span> -
          <span><strong>{{ $date['english'] }}</strong></span>
        </div>
      </div>
    </div>


    <div class="col-8 ">
      <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 text-center mt-1 mb-2">
        {{-- <img src="{{ url('/'.$advertise->firstWhere('add_type','hbanner')->location) }}" class="img-fluid" alt="amader protidin"> --}}
      </div>
    </div>


  </div>
</div>

</div>


<header class="header sticky-top navbarzindex shadow rounded">
  <div class="container-fluid">
    <div class="row">
      {{--  <div class="col-lg-2 col-md-2 col-2">  --}}
      <div class="col-lg-2 col-md-2 col-2">



        <div class="d-xs-block d-sm-block d-md-block d-xl-none d-xxl-none header-left d-flex align-items-center">
          <div class="menu-toggle-btn mr-20">

            <a href ="#"class ="">
              <i id="menu-toggle" class="mdi mdi-menu mdi-36px "></i>
            </a>

          </div>

        </div>

        <div class="d-none d-xl-block d-xxl-block header-left d-flex align-items-center">


            <a href ="{{ route('home.page') }}"class ="">
              <img src="{{ url('/'.$webcongigData->logo) }}" class="img-fluid" alt="amader protidin">
            </a>


        </div>



      </div>

      {{--  <div class="col-lg-9 col-md-9 col-9 text-center">  --}}
      <div class="col-lg-9 col-md-9 col-8 text-center">

        <div class="mt-1 d-sm-block d-md-block d-xl-none d-xxl-none text-center mt-2">
          <a href ="{{ route('home.page') }}"class ="">
            <img src="{{ url('/'.$webcongigData->logo) }}" class="img-fluid" alt="amader-protidin">
          </a>
        </div>

        <div class="mt-1 d-none d-xl-block d-xxl-block text-center">



            <a href ="{{ route('home.page') }}" class="p-2 btn hvr-float-shadow menuButton" >
              <span class=" text">প্রচ্ছদ</span>
            </a>

            @foreach ( $allmenu as $menukye => $mainvalue)

              @if (sizeof($mainvalue->submenus)>0)


              <ul class="btn hvr-float-shadow menuButton">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle p-2 menuButton " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $mainvalue->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($mainvalue->submenus as $submenuvalue)
                    <li><a class="dropdown-item" href="{{ route('home.submenupost',$submenuvalue->id) }}">{{$submenuvalue->name  }}</a></li>
                    @endforeach
                  </ul>
                </li>
              </ul>

              @else

              <a href ="{{ route('home.mainmenupost',$mainvalue->id) }}" class="p-2 btn hvr-float-shadow menuButton" >
                <span class="text">{{ $mainvalue->name }}</span>
              </a>

              @endif


              @endforeach


            <a href ="{{ route('home.loadgallery') }}" class="p-2 btn hvr-float-shadow menuButton" >
              <span class="">ছবি</span>
            </a>
            <a href ="{{ route('home.loadarchive') }}" class="p-2 btn hvr-float-shadow menuButton" >
              <span class="">আর্কাইভ</span>
            </a>



        </div>


      </div>



      <div class="col-lg-1 col-md-1 col-2">
        <div class="header-right">

          <!-- message start -->
          {{--  <div class="mt-2 ml-15  d-md-flex" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Registration">
            <a href=" {{ route('auth.registration') }}" class="btn btn-light" >
              <i class="mdi mdi-account-plus mdi-24px"></i>
            </a>
          </div>  --}}


          <div class=" mt-2 ml-15 d-md-flex" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Login">
            <a href ="{{ route('auth.login') }}" class="btn btn-light" >
              <i class="mdi mdi-login-variant mdi-24px"></i>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</header>
<!-- ========== header end ========== -->
