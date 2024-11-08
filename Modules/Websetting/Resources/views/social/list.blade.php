@extends('layout.admin.home')

@section('content')

@push('sub_page_styles')
    @include('common.datatablecss')
@endpush

@include('common.message')

    <div class="row">
        <div class="col-12">
            <div class="text-end">
                <a class="btn btn-primary m-2" href="{{ route('social.create') }}"  >{{ __('webstring.add') }}</a>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card-style mb-30">
                        <h4 class="mb-10">{{ $theading }}</h4>
                        
                        <div class="table-wrapper table-responsive">
                          <table class="table" id="social">

                            <thead>
                              <tr>
                                <th><h6>#</h6></th>
                                <th><h6>{{ __('webstring.link') }}</h6></th>
                                <th><h6>{{ __('webstring.icone') }}</h6></th>
                                <th><h6>{{ __('webstring.status') }}</h6></th>
                                <th><h6>{{ __('webstring.action') }}</h6></th>
                              </tr>
                              <!-- end table row-->
                            </thead>


                            <tbody>

                              @foreach ($data as $kye => $value)
                                  
                             
                              <tr>
                                    <td>{{ $kye+1 }}</td>

                                    <td class="min-width">
                                        <a href="{{ $value->link }}" target="_blank" >{{ $value->link }}</a>
                                    </td>

                                    <td class="min-width text-primary">
                                        <p><i class="text-primary {{ $value->icone }} mdi-24px"></i></p>
                                    </td>


                                    <td class="min-width">

                                        @if ($value->status == 1)
                                            <span class="status-btn active-btn">{{ __('webstring.active') }}</span>
                                        @else
                                            <span class="status-btn dark-btn">{{ __('webstring.disable') }}</span>
                                        @endif
                                    
                                    </td>

                                    <td>
                                        <div class="action">

                                            <a class="text-primary m-1"  href="{{ route('social.edit',$value->id) }}"><i class="mdi mdi-circle-edit-outline mdi-24px"></i></a>

                                            <a class="text-danger m-1"  href="{{ route('social.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();">
                                                <i class="mdi mdi-trash-can mdi-24px"></i>
                                            </a>

                                            <form method="POST" id="del{{$value->id}}" action="{{ route('social.destroy', $value->id) }}" style="display: none;">
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
@endpush
@endsection