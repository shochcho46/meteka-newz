<h3 class="border-bottom border-danger  p-2">
    <a href="#" class="bg-success text-white  p-2"> আজকের পত্রিকা </a>
</h3>


<div class="row">
    
        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-12  mt-2 mb-2 ">
            <div class="todayPaper">
                <a data-fancybox="gallery" data-caption="Page 1" href="{{ url($getEpaper->where('page_number',1)->first()->location)  }}">
                    <img class="img-fluid rounded" width="100%"   src="{{ url($getEpaper->where('page_number',1)->first()->location)  }}" alt="{{ basename(url($getEpaper->where('page_number',1)->first()->location)) }}" />
                </a>
            </div>
            <h6 class="text-center">Page1</h6>
        </div>
        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-12  mt-2 mb-2 ">
            <div class="todayPaper">
                <a data-fancybox="gallery" data-caption="Page 2" href="{{ url($getEpaper->where('page_number',2)->first()->location)  }}">
                    <img class="img-fluid rounded" width="100%"   src="{{ url($getEpaper->where('page_number',2)->first()->location)  }}" alt="{{ basename(url($getEpaper->where('page_number',2)->first()->location)) }}" />
                </a>
            </div>
            <h6 class="text-center">Page2</h6>
        </div>
        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-12  mt-2 mb-2 ">
            <div class="todayPaper ">
                <a data-fancybox="gallery" data-caption="Page 3" href="{{ url($getEpaper->where('page_number',3)->first()->location)  }}">
                    <img class="img-fluid rounded" width="100%"   src="{{ url($getEpaper->where('page_number',3)->first()->location)  }}"  alt="{{ basename(url($getEpaper->where('page_number',3)->first()->location)) }}" />
                </a>
            </div>
            <h6 class="text-center">Page3</h6>
        </div>
        <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-6 col-sm-12  mt-2 mb-2 ">
            <div class="todayPaper">
                <a data-fancybox="gallery" data-caption="Page 4" href="{{ url($getEpaper->where('page_number',4)->first()->location)  }}">
                    <img class="img-fluid rounded" width="100%"   src="{{ url($getEpaper->where('page_number',4)->first()->location)  }}" alt="{{ basename(url($getEpaper->where('page_number',4)->first()->location)) }}" />
                </a>
            </div>
            <h6 class="text-center">Page4</h6>
        </div>
    
    
</div>

   


