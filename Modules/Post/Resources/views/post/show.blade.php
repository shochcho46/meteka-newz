@extends('layout.admin.home')

@section('content')


    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1"></div>


            <div class="col-xxl-8 col-xl-8 col-md-10 col-sm-10">
                <div class="card-style mb-30">

                <h2 class="mb-5 mt-5 ">
                    {{  $post->head  }}
                </h2>


                <div class="text-center mb-4">
                    {{-- <img src="{{ url('/'.$post->imgloc) }}" class="img-fluid"> --}}
                    @if ($post->hasMedia('postpic'))
                        <img src="{{ $post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="Post Image" class="img-fluid" />
                    @else
                        <img src="{{ url($post->imgloc) }}" class="img-fluid"  alt="Default Image" />
                    @endif
                    <br>
                    <small>{{ $post->caption }}</small>
                </div>

                <h6 class="mb-5">
                    {{ $post->subhead }}
                </h6>

                <p class="text-justify mb-3 mt-5">
                    {!! $post->detail !!}
                </p>

                <div class="mt-5 mb-5 text-left">
                    {{ $post->author }}
                </div>
            </div>
        </div>

        <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1"></div>


    </div>


    @endsection
