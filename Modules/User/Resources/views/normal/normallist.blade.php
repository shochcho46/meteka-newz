@extends('layout.admin.home')

@section('content')

@push('sub_page_styles')
    @include('common.datatablecss')
@endpush

@include('common.message')

    <div class="row">
        <div class="col-12">
            <div class="text-end">
                <a class="btn btn-primary m-2" href="{{ route('createuser.create') }}"  >{{ __('webstring.add') }}</a>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card-style mb-30">
                        <h4 class="mb-10">{{ $theading }}</h4>
                        
                        <div class="table-wrapper table-responsive">
                          <table class="table" id="admintable">

                            <thead>
                              <tr>
                                <th><h6>#</h6></th>
                                <th><h6>{{ __('webstring.name') }}</h6></th>
                                <th><h6>{{ __('webstring.user_type') }}</h6></th>
                                <th><h6>{{ __('webstring.email') }}</h6></th>
                                <th><h6>{{ __('webstring.mobile') }}</h6></th>
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
                                        <p >{{ $value->udtail->name }}</p>
                                    </td>

                                    <td class="min-width">
                                        <p >{{ $value->role->name }}</p>
                                    </td>

                                    <td class="min-width">
                                        <p >{{ $value->email  }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p >{{ $value->mobile  }}</p>
                                    </td>
                                    


                                    <td class="min-width">

                                        @if ($value->status == 1)
                                            <span class="status-btn active-btn">{{ __('webstring.active') }}</span>
                                            @php 
                                                $status = 0;
                                                $tooltip = "Disable" ;
                                                $icon = "text-dark mdi mdi-eye-off mdi-24px";
                                            @endphp
                                        @else
                                            <span class="status-btn dark-btn">{{ __('webstring.disable') }}</span>
                                            @php
                                                $status = 1;
                                                $icon = "text-success mdi mdi-eye mdi-24px";
                                                $tooltip = "Active" ;
                                             @endphp
                                        @endif
                                    
                                    </td>

                                    <td>
                                        <div class="action">


                                        @if ($value->status == 1)
                                       
                                            <a class="text-dark m-1"  href="{{ route('createuser.status',['id' => $value->id, 'field' => 'status','value' =>  $status]) }}" onclick="event.preventDefault(); document.getElementById('status{{$value->id}}').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.disable') }}">
                                                <i class="mdi mdi-eye-off mdi-24px"></i>
                                            </a>

                                        @else
                                        
                                            <a class="text-success m-1"  href="{{ route('createuser.status',['id' => $value->id, 'field' => 'status','value' =>  $status]) }}" onclick="event.preventDefault(); document.getElementById('status{{$value->id}}').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.enable') }}">
                                                <i class="mdi mdi-eye-check mdi-24px"></i>
                                            </a>

                                        @endif 

                                        <form method="POST" id="status{{$value->id}}" action="{{ route('createuser.status', ['id' => $value->id, 'field' => 'status','value' =>  $status]) }}" style="display: none;">
                                            @csrf
                                            @method('put')
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