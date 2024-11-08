<div class="card-style mb-30">

    <div class="row">
        <h2 class="p-1 m-1">
            {{ $data->head  }}
        </h2>
    </div>

    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 mt-2">
            <div>
                <a href="{{ route('home.print',$data->id) }}" class="ml-1 text-dark" target="_blank"><i class="mdi mdi-printer mdi-24px"></i></a>
            </div>
            <div class="mt-2 mb-2 text-left">
                {{ $data->author }}

            </div>
            <div class="mt-2 mb-2 text-left">
                {{ $data->created_at->diffForHumans(); }}
            </div>
            <div class="mt-2 mb-2 text-left">
               <i class="mdi mdi-eye"></i> <small class="ml-1">{{ $totalView }}</small>

            </div>
        </div>
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 mt-2 text-xxl-end text-lg-end text-xl-end text-md-end text-sm-center ">
            @include('post::post.pagepart.share')

        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 p-1 text-center">
            @if ($data->hasMedia('postpic'))
                <img src="{{ $data->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
            @else
                <img src="{{ url($data->imgloc) }}" class="img-fluid" alt="news-picture" >
            @endif
            <br>
            <small class="mt-1">{{ $data->caption }}</small>
        </div>
    </div>

    @if (!empty($data->subhead))
    <div class="row">
        <h6 class="mb-1 mt-2 text-danger">
            {{ $data->subhead }}
        </h6>
    </div>
    @endif


    @if (!empty($data->detail))
    <div class="row text-dark">
        <p class="mb-4 text-dark mt-1 p-1">
            {!! $data->detail !!}
        </p>
    </div>
    @endif

    <div class="row mt-3">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-3">
            @include('post::post.pagepart.fblikeshare')
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 text-end">
            @include('post::post.pagepart.share')
        </div>

    </div>

    @if ($fbcomment ==1)
    <div class="row mt-3">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-3 text-center">
            @include('post::post.pagepart.comment')
        </div>

    </div>

    @endif



</div>
