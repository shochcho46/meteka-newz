@extends('layout.admin.home')

@section('content')

@push('sub_page_styles')
    @include('common.datatablecss')
@endpush

@include('common.message')

    <div class="row">
        <div class="col-12">

          <form method="POST" id="albumsearch" action="{{ route('albam.albumSearch') }}" enctype="multipart/form-data">
            @csrf
           
       
            <div class="col-12 ">
              <div class="row">
                <div class="col-xl-2 col-xxl-2 col-md-2 col-xs-12 col-sm-12">
                  
                </div>
                <div class="col-xl-8 col-xxl-8 col-md-8 col-xs-12 col-sm-12">
                  @include('common.daterange')
                </div>
                <div class="col-xl-2 col-xxl-2 col-md-2 col-xs-12 col-sm-12">
                  
                </div>
              
              </div>
            </div>

        </form>


            <div class="text-end">
                <a class="btn btn-primary m-2" href="{{ route('albam.create') }}"  >{{ __('webstring.add') }}</a>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card-style mb-30">
                        <h4 class="mb-10">{{ $theading }}</h4>
                        
                        <div class="table-wrapper table-responsive">
                          <table class="table" id="albumtable" >

                            <thead>
                              <tr>
                                <th><h6>#</h6></th>
                                <th><h6>{{ __('webstring.album_name') }}</h6></th>
                                <th><h6>{{ __('webstring.album_slider') }}</h6></th>
                                <th><h6>{{ __('webstring.album_created') }}</h6></th>
                                <th><h6>{{ __('webstring.action') }}</h6></th>
                              </tr>
                              <!-- end table row-->
                            </thead>


                            <tbody>

                              @foreach ($data as $kye => $value)
                                  
                             
                              <tr>
                                    <td>{{ $kye+1 }}</td>

                                    <td class="min-width">
                                      <p>{{ $value->name }} </p>
                                    </td>

                                    <td class="min-width">

                                      @if ($value->slider == 1)
                                          <span class="status-btn active-btn">{{ __('webstring.active') }}</span>
                                         
                                      @else
                                          <span class="status-btn dark-btn">{{ __('webstring.disable') }}</span>
                                         
                                      @endif
                                  
                                    </td>

                                    <td class="min-width">
                                      <p>{{ $value->created_at->format('d-m-Y'); }} </p>
                                     
                                    </td>

                                    <td>
                                        <div class="action">

                                           
                                          <a class="text-primary m-1"  href="{{ route('albam.edit',$value->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.edit') }}"><i class="mdi mdi-circle-edit-outline mdi-24px"></i></a>

                                           
                                            <a class="text-danger m-1"  href="{{ route('albam.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.delete') }}">
                                                <i class="mdi mdi-trash-can mdi-24px"></i>
                                            </a>

                                            <form method="POST" id="del{{$value->id}}" action="{{ route('albam.destroy', $value->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                           
                                           
                                        </div>
                                    </td>
                              </tr>

                              @endforeach  

                             
                            </tbody>
                          </table>
                          
                           <!-- end table -->
                        </div>
                      </div>
                      <!-- end card -->
                    </div>
                    <!-- end col -->
                  </div>
            </div>
        </div>

    </div>
@push('sub_page_js')
    @include('common.datatablejs')
    <script src="{{ asset('js/datetimepicker.js') }}" ></script>
@endpush
@endsection