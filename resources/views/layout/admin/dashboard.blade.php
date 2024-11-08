@extends('layout.admin.main')
@push('custom-css')
<link href="{{ asset('chartjs/chart.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="row"> 

  
  <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="icon-card mb-30">
      <div class="icon primary">
        <i class="mdi mdi-account-multiple-plus mdi-36px"></i>
      </div>
      <div class="content">
        <h6 class="mb-10">Total User</h6>
        <h3 class="text-bold mb-10">{{ $cardData['userCount'] }}</h3>
        
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="icon-card mb-30">
      <div class="icon primary">
        <i class="mdi mdi-format-list-bulleted-type mdi-36px"></i>
      </div>
      <div class="content">
        <h6 class="mb-10">Total Category </h6>
        <h3 class="text-bold mb-10">{{ $cardData['category'] }}</h3>
        
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="icon-card mb-30">
      <div class="icon primary">
        <i class="mdi mdi-newspaper-variant-outline mdi-36px"></i>
      </div>
      <div class="content">
        <h6 class="mb-10">Today News</h6>
        <h3 class="text-bold mb-10">{{ $cardData['newsCount'] }}</h3>
        
      </div>
    </div>
  </div>


  <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-6">
    <div class="icon-card mb-30">
      <div class="icon primary">
        <i class="mdi mdi-eye-outline mdi-36px"></i>
      </div>
      <div class="content">
        <h6 class="mb-10">Today View</h6>
        <h3 class="text-bold mb-10">{{ $cardData['totalView'] }}</h3>
        
      </div>
    </div>
  </div>

</div>

<input type="hidden" id="year"  value="{{ json_encode($chartData['year'])  }}">
<input type="hidden" id="news" value="{{ json_encode($chartData['news'])  }}">
<input type="hidden" id="view" value="{{ json_encode($chartData['view'])  }}">

<input type="hidden" id="monthName" value="{{ json_encode($chartData['monthName'])  }}">
<input type="hidden" id="monthView" value="{{ json_encode($chartData['monthWiseView'])  }}">
<input type="hidden" id="monthNews" value="{{ json_encode($chartData['monthWiseNews'])  }}">

<input type="hidden" id="userName" value="{{ json_encode($chartData['userName'])  }}">
<input type="hidden" id="totalUpload" value="{{ json_encode($chartData['totalUpload'])  }}">


<input type="hidden" id="mainMenu" value="{{ json_encode($chartData['mainMenu'])  }}">
<input type="hidden" id="mainMenuNews" value="{{ json_encode($chartData['mainMenuNews'])  }}">


<input type="hidden" id="subMenu" value="{{ json_encode($chartData['subMenu'])  }}">
<input type="hidden" id="subMenuNews" value="{{ json_encode($chartData['subMenuNews'])  }}">


<input type="hidden" id="currentMainMenu" value="{{ json_encode($chartData['currentMainMenu'])  }}">
<input type="hidden" id="currentMainMenuNews" value="{{ json_encode($chartData['currentMainMenuNews'])  }}">

<input type="hidden" id="currentSubMenu" value="{{ json_encode($chartData['currentSubMenu'])  }}">
<input type="hidden" id="currentSubMenuNews" value="{{ json_encode($chartData['currentSubMenuNews'])  }}">


<div class="row">

  <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
    <div class="card-style mb-30">
      <div>
        <canvas id="yearNewsData"></canvas>
      </div>
    </div>
  </div>

  <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
    <div class="card-style mb-30">
      <div>
        <canvas id="userNewsData"></canvas>
      </div>
    </div>
  </div>
  

</div>

<div class="row">

  <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="card-style mb-30">
      <div>
        <canvas id="monthNewsDataView"></canvas>
      </div>
    </div>
  </div>


</div>

<div class="row">

  
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">
    <div class="card-style mb-30">
      <div>
        <canvas id="currentMainNewsData" height="328"></canvas>
      </div>
    </div>
  </div>


  <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
    <div class="card-style mb-30">
      <div>
        <canvas id="currentSubNewsData"></canvas>
      </div>
    </div>
  </div>


</div>


<div class="row">

  <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
    <div class="card-style mb-30">
      <div>
        <canvas id="userSubCategoryData" height="300"></canvas>
      </div>
    </div>
  </div>

  <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
    <div class="card-style mb-30">
      <div>
        <canvas id="userMainCategoryData"></canvas>
      </div>
    </div>
  </div>


</div>



@endsection

@section('subpagejs')
    <script src="{{ asset('chartjs/chart.js') }}" ></script>
    <script src="{{ asset('chartjs/mygraph.js') }}" ></script>
    
@endsection