@extends('layout.normal.main')
@push('share-meta')
    @include('post::post.pagepart.sharemeta')
@endpush

@section('content')
    <div class="row">
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 mt-3 mb-3">

            <div class="mt-3">
                @include('layout.normal.pagepart.postshow')
            </div>


        </div>


        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 mt-3 mb-3">

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3 " style="width: auto; height:350px">
                    {{-- <a href="{{ $advertise->firstWhere('add_type', 'sidebarone')->link }}" target="_blank">
                        <img src="{{ url('/' . $advertise->firstWhere('add_type', 'sidebarone')->location) }}" class="img-fluid">
                    </a> --}}
                </div>
            </div>

            <div class="row">
                <div>
                    @include('layout.normal.pagepart.latestmost')
                </div>

            </div>

            <div class="row">
                <div class = "mt-4 mb-2"  style="width: auto; height:350px">
                    {{-- <a href="{{ $advertise->firstWhere('add_type', 'rectangle')->link }}" target="_blank" class=" ">
                        <img src="{{ url('/' . $advertise->firstWhere('add_type', 'rectangle')->location) }}"
                            class="img-fluid  ">
                    </a> --}}
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        @forelse ($moreNews as $postValue)
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 mt-3 mb-2">
                <a href="{{ route('home.newsWithSlug', [$postValue->id, $postValue->post->slug]) }}" class="hvr-bounce-out">
                    <div class="card">
                    @if ($postValue->post->hasMedia('postpic'))
                        <img src="{{ $postValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="card-img-top" />
                    @else
                        <img src="{{ url($postValue->post->imgloc) }}" class="card-img-top" alt="news-picture" >
                    @endif
                        <div class="card-body">
                            <p class="card-text text-dark">{{ Str::limit($postValue->post->head, 70) }}</p>
                        </div>
                    </div>

                </a>
            </div>
        @empty
        @endforelse

    </div>

    {{-- <div class="row">

        @php
            $popupAdd = $advertise->firstWhere('add_type', 'popup');
        @endphp

        @if (!empty($popupAdd))
            <div id="dialog-confirm">

                <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 ">
                    <div class = "rectaboxadd mb-2">

                        <a href="{{ $advertise->firstWhere('add_type', 'popup')->link }}" target="_blank"
                            class=" mt-xxl-5 mt-xl-5 mt-lg-5">
                            <img src="{{ url('/' . $advertise->firstWhere('add_type', 'popup')->location) }}"
                                class="img-fluid mt-xxl-5 mt-xl-5 mt-lg-5" alt="news-picture">
                        </a>
                    </div>


                </div>

            </div>
        @endif

    </div> --}}
@endsection


@push('custom-scripts')
    <script type="text/javascript" src="{{ asset('js/share.js') }}"></script>

    {{-- <script>
        $(function() {

            $("#dialog-confirm").dialog({
                resizable: false,

                height: "auto",
                width: "auto",
                create: function(event, ui) {
                    // Set maxWidth
                    $(this).css("maxWidth", "660px");
                },
                modal: true,
                buttons: {
                    Close: function() {
                        $(this).dialog("close");
                    }
                }
            });
            $("#dialog-confirm").siblings('div.ui-dialog-titlebar').remove();
        });
    </script> --}}
@endpush
