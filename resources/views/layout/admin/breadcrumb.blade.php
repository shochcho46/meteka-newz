<!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="titlemb-30">
                  <h2>{{ $title['page_title'] }}</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">{{ __('webstring.dashboard') }}</a>
                      </li>
                      @if (empty($title['third_title']))
                        <li class="breadcrumb-item active" aria-current="{{ $title['sub_title'] }}">
                          {{ $title['sub_title'] }}
                        </li>
                      @else
                      <li class="breadcrumb-item">
                        <a href="#0">{{ $title['sub_title'] }}</a>
                      </li>
                        
                      <li class="breadcrumb-item active" aria-current="{{ $title['third_title'] }}">
                        {{ $title['third_title'] }}
                      </li>
                      @endif
                      
                     
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->