@extends('layout.normal.main')

@push('share-meta')
@include('post::post.pagepart.sharemeta')
@endpush

@section('content')

<div class="row">
    
    <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1"></div>

        <div class="col-xxl-8 col-xl-8 col-md-10 col-sm-10">
        <div class="card-style mb-30">
            

            <h1 class="mb-5 mt-5 ">
                {{  $data->head  }}
            </h1>
            <div class="mt-2 mb-2 text-left">
                {{ $data->author }}
            </div>
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-md-12 col-sm-12 col-xs-12 ">
                    {{ $data->updated_at->diffForHumans(); }}
                </div>
                <div class="col-xxl-6 col-xl-6 col-md-12 col-sm-12 col-xs-12 text-xxl-end text-sm-left text-md-left text-xl-end">
                    @include('post::post.pagepart.share')
                </div>
               
            </div>

            <hr>
            <div class="text-center mb-4 mt-3">
                <img src="{{ url('/'.$data->imgloc) }}" class="img-fluid">
                <br>
                <small>{{ $data->caption }}</small>
            </div>

            <h6 class="mb-5">
                {{ $data->subhead }}
            </h6>

            <p class="text-justify mb-3 mt-5">
                {!! $data->detail !!}

               
            </p>
            {{--  <p class="text-justify mb-3 mt-5">
                
                {{  strip_tags(Str::limit($data->detail, 500, $end='.......'))    }}
            </p>  --}}

           
        </div>
    </div>

    <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1"></div>

    


</div>

@if($data->detail)

@endif

<div class="row ">
   
    <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1"></div>
    
    <div class="col-xxl-8 col-xl-8 col-md-10 col-sm-10 ">


        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-md-12 col-sm-12 col-xs-12 mt-3">
                @include('post::post.pagepart.fblikeshare')
            </div>
            <div class="col-xxl-6 col-xl-6 col-md-12 col-sm-12 col-xs-12 text-xxl-end text-sm-left text-md-left text-xl-end">
                @include('post::post.pagepart.share')
            </div>
           
        </div>
        
       

    </div>

    <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1"></div>
</div>


<div class="row ">
   
    <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1"></div>
    
    <div class="col-xxl-8 col-xl-8 col-md-10 col-sm-10 text-center">
        
        @include('post::post.pagepart.comment')
    </div>

    <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1"></div>
</div>




@endsection


@push('custom-scripts')
    <script type="text/javascript" src="{{ asset('js/share.js') }}"></script>

 
@endpush