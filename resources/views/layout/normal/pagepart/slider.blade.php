<h3 class="border-bottom border-danger  p-2">
    <a href="{{ route('home.loadgallery') }}" class="bg-success text-white  p-2"> ফটো গ্যালারি </a>
</h3>

<div class="row mb-3 d-none d-md-block">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        @forelse ($imageGallery->galleries  as $imgGallery)

        @if ($loop->first)
            <div class="carousel-item active">

            @if ($imgGallery->hasMedia('gallery'))
                <img src="{{ $imgGallery->getFirstMediaUrl('gallery', 'webp_format') }}" alt="news-picture" class="d-block w-100" />
            @else
                <img src="{{ url($imgGallery->location) }}" class="d-block w-100" alt="news-picture">
            @endif

            <div class="carousel-caption d-none d-md-block">

                <p>{{ $imgGallery->caption }}</p>
            </div>
          </div>
        @else
        <div class="carousel-item">

            @if ($imgGallery->hasMedia('gallery'))
                <img src="{{ $imgGallery->getFirstMediaUrl('gallery', 'webp_format') }}" alt="news-picture" class="d-block w-100" />
            @else
                <img src="{{ url($imgGallery->location) }}" class="d-block w-100" alt="news-picture">
            @endif

            <div class="carousel-caption d-none d-md-block">

                <p>{{ $imgGallery->caption }}</p>
            </div>
          </div>
        @endif

        @empty

        @endforelse


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
  </div>

</div>



<div class="row mb-3 d-md-none">

  <div id="carouselExampleCaptionsSmall" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
      @forelse ($imageGallery->galleries  as $imgGallery)

      @if ($loop->first)
          <div class="carousel-item sliderMobile active">
          <img src="{{ url($imgGallery->location) }}" class="d-block w-100" alt="news-picture">
          <div class="carousel-caption d-none d-md-block">

              <p>{{ $imgGallery->caption }}</p>
          </div>
        </div>
      @else
      <div class="carousel-item sliderMobile">
          <img src="{{ url($imgGallery->location) }}" class="d-block w-100" alt="news-picture">
          <div class="carousel-caption d-none d-md-block">

              <p>{{ $imgGallery->caption }}</p>
          </div>
        </div>
      @endif

      @empty

      @endforelse


      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptionsSmall" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptionsSmall" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
</div>

</div>
