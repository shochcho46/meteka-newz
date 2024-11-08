@extends('layout.admin.home')

@section('content')

@push('sub_page_styles')
    @include('common.datatablecss')
@endpush

@include('common.message')

    <div class="row">
        <div class="col-12">
            <div class="text-end">
                {{-- <a class="btn btn-primary m-2" href="{{ route('role.create') }}"  >{{ __('webstring.add') }}</a> --}}
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card-style mb-30">
                        <h4 class="mb-10">{{ $theading }}</h4>

                        <div class="table-wrapper table-responsive">
                          <table class="table" id="roletable">

                            <thead>
                              <tr>
                                <th><h6>#</h6></th>
                                <th><h6>{{ __('webstring.name') }}</h6></th>
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
                                        <p >{{ $value->name }}</p>
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

                                        @if (($value->id == 1) || ($value->id == 2) || ($value->id == 4) )



                                        @else

                                            <a class="text-primary m-1"  href="{{ route('role.edit',$value->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.edit') }}"><i class="mdi mdi-circle-edit-outline mdi-24px"></i></a>


                                            <a class="text-danger m-1"  href="{{ route('role.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.delete') }}">
                                                <i class="mdi mdi-trash-can mdi-24px"></i>
                                            </a>

                                            <form method="POST" id="del{{$value->id}}" action="{{ route('role.destroy', $value->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif
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
