<!-- ========== header start ========== -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
                <div class="header-left d-flex align-items-center">
                    <div class="menu-toggle-btn mr-20">

                        <a href="#" class="pe-auto">
                            <i id="menu-toggle" class="mdi mdi-menu mdi-36px "></i>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
                <div class="header-right">

                    <!-- profile start -->
                    <div class="profile-box ml-15">
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-info">
                                <div class="info">
                                    <h6>{{ auth()->user()->udtail->name }}</h6>
                                    <div class="image img-fluid">
                                        <img src="{{ url(auth()->user()->udtail->imgloc) }}" alt="news-picture" width="25" style="height: 50px"/>
                                        <span class="status"></span>
                                    </div>
                                </div>
                            </div>
                            <i class="lni lni-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                            <li>
                                <a href="{{ route('profile.create') }}">
                                    <i class="lni lni-user"></i> View Profile
                                </a>
                            </li>


                            <li>
                                <a href="{{ route('auth.logout') }}"> <i class="lni lni-exit"></i> Sign Out </a>
                            </li>
                        </ul>
                    </div>
                    <!-- profile end -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ========== header end ========== -->
