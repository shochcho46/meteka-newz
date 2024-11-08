<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="{{ route('admin.home') }}">
            <img src="{{ url('/'.$webcongigData->logo) }}" class="img-fluid" alt="logo" />
        </a>
    </div>

    @auth
    <nav class="sidebar-nav">
        <ul>

            <li class="nav-item {{ ($title['prefix'] == 'admin') ? 'active' : ''}}">
                <a href="{{ route('admin.home') }}" >
                    <i class="mdi mdi-view-dashboard-outline mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.dashboard') }}</span>
                </a>
            </li>

           

           
            @if ((auth()->user()->role_id == 2)||(auth()->user()->role_id == 1))
            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-dots-horizontal-circle-outline mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.menu') }}</span>
                </a>
                <ul id="menu" class="accordion-collapse collapse {{ (($title['prefix'] == 'mainmenus')||($title['prefix'] == 'submenus')) ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('mainmenu.index') }}" class="{{ ($title['prefix'] == 'mainmenus') ? 'active' : ''}}">
                             {{ __('webstring.main_menu') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('submenu.index') }}" class="{{ ($title['prefix'] == 'submenus') ? 'active' : ''}}">
                             {{ __('webstring.sub_menu') }}
                         </a>
                    </li>

                </ul>
            </li>
            @endif

            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#post" aria-controls="post" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-newspaper-variant-multiple-outline mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.post') }}</span>
                </a>

                <ul id="post" class="accordion-collapse collapse {{ (($title['prefix'] == 'posts')||($title['prefix'] == 'displays')) ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('post.index') }}" class="{{ ($title['prefix'] == 'posts') ? 'active' : ''}}">
                             {{ __('webstring.post') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('display.index') }}" class="{{ ($title['prefix'] == 'displays') ? 'active' : ''}}">
                             {{ __('webstring.display') }}
                         </a>
                    </li>

                </ul>

            </li>



            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#epaper" aria-controls="post" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-newspaper mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.epaper') }}</span>
                </a>

                <ul id="epaper" class="accordion-collapse collapse {{ (($title['prefix'] == 'eposts')) ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('epost.index') }}" class="{{ ($title['prefix'] == 'eposts') ? 'active' : ''}}">
                             {{ __('webstring.epaper') }}
                        </a>
                    </li>

                    
                </ul>

            </li>

            

            <span class="divider"><hr /></span>

            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#gallery" aria-controls="gallery" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-view-gallery mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.gallery') }}</span>
                </a>
                
                @php
                    $secondprifix = str_replace(url('').'/galleries/', '', url()->full())
                @endphp
                
                <ul id="gallery" class="accordion-collapse collapse {{ (( $secondprifix == 'album')||( $title['prefix'] == 'galleries')||($secondprifix == 'image')) ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('albam.index') }}" class="{{ ($secondprifix == 'album') ? 'active' : ''}}">
                             {{ __('webstring.album') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gallery.index') }}" class="{{ ($secondprifix == 'image') ? 'active' : ''}}">
                             {{ __('webstring.gallery') }}
                        </a>
                    </li>

                </ul>

            </li>

            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#advertise" aria-controls="advertise" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-bullhorn-variant mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.advertise') }}</span>
                </a>

                <ul id="advertise" class="accordion-collapse collapse {{ (($title['prefix'] == 'advertisements')) ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('advertisement.index') }}" class="{{ ($title['prefix'] == 'advertisements') ? 'active' : ''}}">
                             {{ __('webstring.advertise') }}
                        </a>
                    </li>

                    
                </ul>

            </li> 


            @if ((auth()->user()->role_id == 2)||(auth()->user()->role_id == 1))

            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#user" aria-controls="user" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-account-star-outline mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.user') }}</span>
                </a>
                @php
                    $secondprifix = str_replace(url('').'/createusers/', '', url()->full())
                @endphp
                
                <ul id="user" class="accordion-collapse collapse {{ (( $secondprifix == 'admin')||( $title['prefix'] == 'createusers')||($secondprifix == 'normal')) ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('createuser.adminindex') }}" class="{{ ($secondprifix == 'admin') ? 'active' : ''}}">
                             {{ __('webstring.user_admin') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('createuser.normalindex') }}" class="{{ ($secondprifix == 'normal') ? 'active' : ''}}">
                             {{ __('webstring.user_normal') }}
                        </a>
                    </li>

                </ul>

            </li>

            @endif

            <span class="divider"><hr /></span>


            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#webconfig" aria-controls="webconfig" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-cogs mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.web_setting') }}</span>
                </a>

                <ul id="webconfig" class="collapse dropdown-nav {{ (($title['prefix'] == 'websettings')||($title['prefix'] == 'footers')||($title['prefix'] == 'socials') ||($title['prefix'] == 'facebooks')) ? 'show' : '' }}">

                    @if ((auth()->user()->role_id == 2)||(auth()->user()->role_id == 1))
                    <li>
                        <a class="{{ ($title['prefix'] == 'websettings') ? 'active' : ''}}" href="{{ route('websetting.create') }}">
                             {{ __('webstring.webconfig') }}
                         </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('footer.create') }}" class="{{ ($title['prefix'] == 'footers') ? 'active' : ''}}">
                             {{ __('webstring.footer') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('social.index') }}" class="{{ ($title['prefix'] == 'socials') ? 'active' : ''}}">
                             {{ __('webstring.social') }}
                         </a>
                    </li>
                    @if (auth()->user()->role_id == 1)
                    <li>
                        <a href="{{ route('facebook.create') }}" class="{{ ($title['prefix'] == 'facebooks') ? 'active' : ''}}">
                             {{ __('webstring.facebook') }}
                         </a>
                    </li>
                    @endif
                  
                </ul>
            </li>


            @if (auth()->user()->role_id == 1)

            <li class="nav-item nav-item-has-children">
                <a href="#0" class="collapsed" data-bs-toggle="collapse" data-bs-target="#permission" aria-controls="permission" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-account-check mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.permission') }}</span>
                </a>

                <ul id="permission" class="accordion-collapse collapse {{ (($title['prefix'] == 'roles')||($title['prefix'] == 'permissions')) ? 'show' : '' }}">
                    <li>
                        <a href="{{ route('role.index') }}" class="{{ ($title['prefix'] == 'roles') ? 'active' : ''}}">
                             {{ __('webstring.permission_role') }}
                        </a>
                    </li>

                </ul>

            </li>

            @endif


            <li class="nav-item {{ ($title['prefix'] == 'seos') ? 'active' : ''}}">
                <a href="{{ route('seo.create') }}" >
                    <i class="mdi mdi-cloud-search-outline mdi-18px mr-5"></i>
                    <span class="text">{{ __('webstring.seo') }}</span>
                </a>
            </li>


            



        </ul>
    </nav>

    @endauth

</aside>
<div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->









