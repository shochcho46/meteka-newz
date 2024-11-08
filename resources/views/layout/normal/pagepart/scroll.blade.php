<header class="" style="z-index: -100">
    <div class="content">
        <div class="simple-marquee-container" >
            <div class="marquee-sibling">
                আজকের শিরোনাম
            </div>
            
            <div class="marquee">
                <ul class="marquee-content-items">
                    @forelse ( $getPostDetail['scrollPost'] as $scrollValue)
                        <li><a class="text-white" href="{{ route('home.postshow',$scrollValue->id) }}"> <i class="mdi mdi-bullhorn-outline"></i> {{ $scrollValue->post->head }} </a></li>
                    @empty
                        
                    @endforelse
                   
                </ul>
            </div>
        </div>
        
    </div>
</header>