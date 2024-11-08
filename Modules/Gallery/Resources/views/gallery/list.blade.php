@extends('layout.admin.home')

@section('content')

@push('sub_page_styles')
    @include('common.datatablecss')
@endpush

@include('common.message')

    <div class="row">
        <div class="col-12">

          <form method="POST" id="epapersearch" action="{{ route('gallery.gallerySearch') }}" enctype="multipart/form-data">
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
                <a class="btn btn-primary m-2" href="{{ route('gallery.create') }}"  >{{ __('webstring.add') }}</a>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card-style mb-30">
                        <h4 class="mb-10">{{ $theading }}</h4>

                        <div class="table-wrapper table-responsive">
                          <table class="table" id="gallerytable" >

                            <thead>
                              <tr>
                                <th><h6>#</h6></th>
                                <th><h6>{{ __('webstring.album_name') }}</h6></th>
                                <th><h6>{{ __('webstring.image') }}</h6></th>
                                <th><h6>{{ __('webstring.caption') }}</h6></th>
                                <th><h6>{{ __('webstring.action') }}</h6></th>
                              </tr>
                              <!-- end table row-->
                            </thead>


                            <tbody>

                              @foreach ($data as $kye => $value)


                              <tr>
                                    <td>{{ $kye+1 }}</td>

                                    <td class="min-width">
                                      <p>{{ $value->albam->name }} </p>
                                    </td>

                                    <td class="min-width text-primary">

                                        @if ($value->hasMedia('gallery'))
                                            <img src="{{ $value->getFirstMediaUrl('gallery', 'webp_format') }}" alt="Post Image" class="img-fluid" width="100"/>
                                        @else
                                            <img src="{{ url($value->location) }}" class="img-fluid" width="100" alt="Default Image" />
                                        @endif

                                    </td>

                                    <td class="min-width">
                                      <p>{{ $value->caption }} </p>
                                    </td>
                                    <td>
                                        <div class="action">


                                          <a class="text-primary m-1"  href="{{ route('gallery.edit',$value->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.edit') }}"><i class="mdi mdi-circle-edit-outline mdi-24px"></i></a>


                                            <a class="text-danger m-1"  href="{{ route('gallery.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.delete') }}">
                                                <i class="mdi mdi-trash-can mdi-24px"></i>
                                            </a>

                                            <form method="POST" id="del{{$value->id}}" action="{{ route('gallery.destroy', $value->id) }}" style="display: none;">
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
