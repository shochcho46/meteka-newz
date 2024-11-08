<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper sidebarzindex">
    <div class="navbar-logo">
        <a href="{{ route('home.page') }}">
            <img src="{{ url('/'.$webcongigData->logo) }}" class="img-fluid">
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>

            <li class="nav-item">
                <a href="{{ route('home.page') }}">
                    <span class="text">প্রচ্ছদ</span>
                </a>
            </li>

            @foreach ( $allmenu as $menukye => $mainvalue)

            @if (sizeof($mainvalue->submenus)>0)

            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#ddmenu_1{{ $menukye }}" aria-controls="ddmenu_1{{ $menukye }}" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="text">{{ $mainvalue->name }}</span>
                </a>

                <ul id="ddmenu_1{{ $menukye }}" class="collapse dropdown-nav">
                    @foreach ($mainvalue->submenus as $submenuvalue)
                        <li>
                            <a href="{{ route('home.submenupost',$submenuvalue->id) }}"> {{$submenuvalue->name  }} </a>
                        </li>
                    @endforeach

                </ul>
            </li>

            @else
                <li class="nav-item">
                    <a href="{{ route('home.mainmenupost',$mainvalue->id) }}">
                        <span class="text">{{ $mainvalue->name }}</span>
                    </a>
                </li>
            @endif


            @endforeach

            <li class="nav-item">
                <a href="{{ route('home.loadarchive') }}">
                    <i class="mdi mdi-archive-eye mdi-18px mr-5"></i>
                    <span class="text">আর্কাইভ</span>
                </a>
            </li>

        </ul>
    </nav>

</aside>
<div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->









