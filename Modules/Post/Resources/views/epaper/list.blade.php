@extends('layout.admin.home')

@section('content')

@push('sub_page_styles')
    @include('common.datatablecss')
@endpush

@include('common.message')

    <div class="row">
        <div class="col-12">

          <form method="POST" id="epapersearch" action="{{ route('epost.epaperSearch') }}" enctype="multipart/form-data">
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
                <a class="btn btn-primary m-2" href="{{ route('epost.create') }}"  >{{ __('webstring.add') }}</a>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card-style mb-30">
                        <h4 class="mb-10">{{ $theading }}</h4>
                        
                        <div class="table-wrapper table-responsive">
                          <table class="table" id="epapertable" >

                            <thead>
                              <tr>
                                <th><h6>#</h6></th>
                                <th><h6>{{ __('webstring.epaper_image') }}</h6></th>
                                <th><h6>{{ __('webstring.epaper_page') }}</h6></th>
                                <th><h6>{{ __('webstring.action') }}</h6></th>
                              </tr>
                              <!-- end table row-->
                            </thead>


                            <tbody>

                              @foreach ($data as $kye => $value)
                                  
                             
                              <tr>
                                    <td>{{ $kye+1 }}</td>

                                    <td class="min-width">
                                      <img src="{{ url($value->location) }}" class="img-fluid" width="100">
                                    </td>

                                    <td class="min-width text-primary">
                                        <p>{{ $value->page_number }} </p>
                                    </td>

                                    <td>
                                        <div class="action">

                                           
                                          <a class="text-primary m-1"  href="{{ route('epost.edit',$value->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.edit') }}"><i class="mdi mdi-circle-edit-outline mdi-24px"></i></a>

                                           
                                            <a class="text-danger m-1"  href="{{ route('epost.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.delete') }}">
                                                <i class="mdi mdi-trash-can mdi-24px"></i>
                                            </a>

                                            <form method="POST" id="del{{$value->id}}" action="{{ route('epost.destroy', $value->id) }}" style="display: none;">
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