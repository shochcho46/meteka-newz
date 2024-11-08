@extends('layout.admin.home')

@section('content')

@push('sub_page_styles')
    @include('common.datatablecss')
@endpush

@include('common.message')

    <div class="row">
        <div class="col-12">

          <form method="POST" id="postsearch" action="{{ route('post.search') }}" enctype="multipart/form-data">
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
                <a class="btn btn-primary m-2" href="{{ route('post.create') }}"  >{{ __('webstring.add') }}</a>
            </div>
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="card-style mb-30">
                        <h4 class="mb-10">{{ $theading }}</h4>

                        <div class="table-wrapper table-responsive">
                          <table class="table" id="tablepost" >

                            <thead>
                              <tr>
                                <th><h6>#</h6></th>
                                <th><h6>{{ __('webstring.head') }}</h6></th>
                                <th><h6>{{ __('webstring.subhead') }}</h6></th>
                                <th><h6>{{ __('webstring.view') }}</h6></th>
                                <th><h6>{{ __('webstring.post_pic') }}</h6></th>
                                <th><h6>{{ __('webstring.action') }}</h6></th>
                              </tr>
                              <!-- end table row-->
                            </thead>


                            <tbody>

                              @foreach ($data as $kye => $value)


                              <tr>
                                    <td>{{ $kye+1 }}</td>

                                    <td class="min-width text-primary">
                                        <p>{{ $value->head }} </p>
                                    </td>

                                    <td class="min-width">
                                        <p >{{ $value->subhead }}</p>
                                    </td>

                                    <td class="min-width">
                                        <p>{{ $value->view }} </p>
                                    </td>


                                    <td class="min-width">


                                        @if ($value->hasMedia('postpic'))
                                            <img src="{{ $value->getFirstMediaUrl('postpic', 'webp_format') }}" alt="Post Image" class="img-fluid" width="100"/>
                                        @else
                                            <img src="{{ url($value->imgloc) }}" class="img-fluid" width="100" alt="Default Image" />
                                        @endif

                                    </td>

                                    <td>
                                        <div class="action">


                                          <a class="text-success m-1"  href="{{ route('post.show',$value->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.show') }}"><i class="mdi mdi-eye mdi-24px"></i></a>

                                            <a class="text-primary m-1"  href="{{ route('post.edit',$value->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.edit') }}"><i class="mdi mdi-circle-edit-outline mdi-24px"></i></a>


                                            <a class="text-danger m-1"  href="{{ route('post.destroy',$value->id) }}" onclick="event.preventDefault(); document.getElementById('del{{$value->id}}').submit();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ __('webstring.delete') }}">
                                                <i class="mdi mdi-trash-can mdi-24px"></i>
                                            </a>

                                            <form method="POST" id="del{{$value->id}}" action="{{ route('post.destroy', $value->id) }}" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>


                                        </div>
                                    </td>
                              </tr>

                              @endforeach


                            </tbody>
                          </table>
                          {{--  pagination start  --}}
                          {{--  <div class="pagination justify-content-center">
                            {{ $data->links() }}
                          </div>  --}}
                          {{--  pagination end  --}}
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
