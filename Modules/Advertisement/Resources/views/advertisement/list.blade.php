@extends('layout.admin.home')

@section('content')

@push('sub_page_styles')
    @include('common.datatablecss')
@endpush

@include('common.message')

    <div class="row">
        <div class="col-12">
            <div class="text-end">
                <a class="btn btn-primary m-2" href="{{ route('advertisement.create') }}"  >{{ __('webstring.add') }}</a>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card-style mb-30">
                        <h4 class="mb-10">{{ $theading }}</h4>
                        
                        <div class="table-wrapper table-responsive">
                          <table class="table" id="advertisetable" >

                            <thead>
                              <tr>
                                <th><h6>#</h6></th>
                                <th><h6>{{ __('webstring.advertise_type') }}</h6></th>
                                <th><h6>{{ __('webstring.image') }}</h6></th>
                                <th><h6>{{ __('webstring.link') }}</h6></th>
                                <th><h6>{{ __('webstring.action') }}</h6></th>
                              </tr>
                              <!-- end table row-->
                            </thead>


                            <tbody>

                              @foreach ($data as $kye => $value)
                                  
                             
                              <tr>
                                    <td>{{ $kye+1 }}</td>

                                    <td class="min-width">
                                      <p>{{ $value->add_type }} </p>
                                    </td>

                                    <td class="min-width text-primary">
                                       
                                        <img src="{{ url($value->location) }}" class="img-fluid" width="100">
                                    </td>

                                    <td class="min-width">
                                      <a href="{{ $value->link  }}" target="_blank">{{ $value->link }} </a>
                                    </td>
                                    <td>
                                        <div class="action">

                                           
                                          <a class="text-primary m-1"  href="{{ route('advertisement.edit',$value->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.edit') }}"><i class="mdi mdi-circle-edit-outline mdi-24px"></i></a>

                                           
                                            <a class="text-danger m-1"  href="{{ route('advertisement.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.delete') }}">
                                                <i class="mdi mdi-trash-can mdi-24px"></i>
                                            </a>

                                            <form method="POST" id="del{{$value->id}}" action="{{ route('advertisement.destroy', $value->id) }}" style="display: none;">
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