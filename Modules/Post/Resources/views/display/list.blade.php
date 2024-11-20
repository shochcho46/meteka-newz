@extends('layout.admin.home')

@section('content')
    @push('sub_page_styles')
        @include('common.datatablecss')
    @endpush

    @include('common.message')

    <div class="row">
        <div class="col-12">


            <form method="POST" id="displaypostsearch" action="{{ route('display.displayPostSearch') }}"
                enctype="multipart/form-data">
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

            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <h4 class="mb-10">{{ $theading }}</h4>

                            <div class="table-wrapper table-responsive">
                                <table class="table" id="displayTable">

                                    <thead>
                                        <tr>
                                            <th>
                                                <h6>#</h6>
                                            </th>
                                            <th>
                                                <h6>{{ __('webstring.head') }}</h6>
                                            </th>
                                            <th>
                                                <h6>{{ __('webstring.post_pic') }}</h6>
                                            </th>
                                            <th>
                                                <h6>{{ __('webstring.main_menu') }}</h6>
                                            </th>
                                            <th>
                                                <h6>{{ __('webstring.sub_menu') }}</h6>
                                            </th>
                                            <th>
                                                <h6>{{ __('webstring.status') }}</h6>
                                            </th>
                                            <th>
                                                <h6>{{ __('webstring.headline') }}</h6>
                                            </th>

                                            <th>
                                                <h6>{{ __('webstring.comment') }}</h6>
                                            </th>
                                            <th>
                                                <h6>{{ __('webstring.scroll') }}</h6>
                                            </th>
                                            <th>
                                                <h6>{{ __('webstring.action') }}</h6>
                                            </th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>


                                    <tbody>

                                        @foreach ($data as $kye => $value)
                                            <tr>
                                                <td>{{ $kye + 1 }}</td>

                                                <td class="min-width">
                                                    <p>{{ $value->post->head }}</p>
                                                </td>

                                                <td class="min-width ">

                                                    @if ($value->post->hasMedia('postpic'))
                                                        <img src="{{ $value->post->getFirstMediaUrl('postpic', 'webp_format') }}"
                                                            alt="news-picture" class="img-fluid" width="50" />
                                                    @else
                                                        <img src="{{ url($value->post->imgloc) }}" class="img-fluid"
                                                            width="50" alt="news-picture">
                                                    @endif
                                                </td>


                                                <td class="min-width">

                                                    <p>{{ $value->mainmenu->name }}</p>

                                                </td>

                                                <td class="min-width">

                                                    @if (!empty($value->submenu->name))
                                                        <p>{{ $value->submenu->name }}</p>
                                                    @endif

                                                </td>

                                                <td class="min-width">
                                                    @if ($value->status == 1)
                                                        <p>{{ __('webstring.publish') }}</p>
                                                    @else
                                                        <p>{{ __('webstring.disable') }}</p>
                                                    @endif
                                                </td>


                                                <td class="min-width">
                                                    @if ($value->is_headline == 1)
                                                        <p>{{ __('webstring.enable') }}</p>
                                                    @else
                                                        <p>{{ __('webstring.disable') }}</p>
                                                    @endif
                                                </td>



                                                <td class="min-width">
                                                    @if ($value->is_fbcomment == 1)
                                                        <p>{{ __('webstring.enable') }}</p>
                                                    @else
                                                        <p>{{ __('webstring.disable') }}</p>
                                                    @endif
                                                </td>

                                                <td class="min-width">
                                                    @if ($value->is_scroll == 1)
                                                        <p>{{ __('webstring.enable') }}</p>
                                                    @else
                                                        <p>{{ __('webstring.disable') }}</p>
                                                    @endif
                                                </td>



                                                <td>
                                                    <div class="action">



                                                        @if ($value->is_headline == 1)
                                                            <a class="text-dark m-1"
                                                                href="{{ route('display.status', ['id' => $value->id, 'field' => 'is_headline', 'value' => 0]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('hed{{ $value->id }}').submit();"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ __('webstring.headline') }}">
                                                                <i class="mdi mdi-alphabetical-off mdi-24px"></i>
                                                            </a>

                                                            <form method="POST" id="hed{{ $value->id }}"
                                                                action="{{ route('display.status', ['id' => $value->id, 'field' => 'is_headline', 'value' => 0]) }}"
                                                                style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @else
                                                            <a class="text-success m-1"
                                                                href="{{ route('display.status', ['id' => $value->id, 'field' => 'is_headline', 'value' => 1]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('hed{{ $value->id }}').submit();"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ __('webstring.headline') }}">
                                                                <i class="mdi mdi-alphabetical mdi-24px"></i>
                                                            </a>

                                                            <form method="POST" id="hed{{ $value->id }}"
                                                                action="{{ route('display.status', ['id' => $value->id, 'field' => 'is_headline', 'value' => 1]) }}"
                                                                style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @endif


                                                        @if ($value->status == 1)
                                                            <a class="text-dark m-1"
                                                                href="{{ route('display.status', ['id' => $value->id, 'field' => 'status', 'value' => 0]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('status{{ $value->id }}').submit();"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ __('webstring.hide') }}">
                                                                <i class="mdi mdi-eye-off mdi-24px"></i>
                                                            </a>

                                                            <form method="POST" id="status{{ $value->id }}"
                                                                action="{{ route('display.status', ['id' => $value->id, 'field' => 'status', 'value' => 0]) }}"
                                                                style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @else
                                                            <a class="text-success m-1"
                                                                href="{{ route('display.status', ['id' => $value->id, 'field' => 'status', 'value' => 1]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('status{{ $value->id }}').submit();"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ __('webstring.publish') }}">
                                                                <i class="mdi mdi-eye mdi-24px"></i>
                                                            </a>

                                                            <form method="POST" id="status{{ $value->id }}"
                                                                action="{{ route('display.status', ['id' => $value->id, 'field' => 'status', 'value' => 1]) }}"
                                                                style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @endif



                                                        @if ($value->is_fbcomment == 1)
                                                            <a class="text-dark m-1"
                                                                href="{{ route('display.status', ['id' => $value->id, 'field' => 'status', 'value' => 0]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('comment{{ $value->id }}').submit();"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ __('webstring.fb_comment_disable') }}">
                                                                <i class="mdi mdi-comment-off mdi-24px"></i>
                                                            </a>

                                                            <form method="POST" id="comment{{ $value->id }}"
                                                                action="{{ route('display.status', ['id' => $value->id, 'field' => 'is_fbcomment', 'value' => 0]) }}"
                                                                style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @else
                                                            <a class="text-success m-1"
                                                                href="{{ route('display.status', ['id' => $value->id, 'field' => 'status', 'value' => 1]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('comment{{ $value->id }}').submit();"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ __('webstring.fb_comment_enable') }}">
                                                                <i class="mdi mdi-comment mdi-24px"></i>
                                                            </a>

                                                            <form method="POST" id="comment{{ $value->id }}"
                                                                action="{{ route('display.status', ['id' => $value->id, 'field' => 'is_fbcomment', 'value' => 1]) }}"
                                                                style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @endif




                                                        @if ($value->is_scroll == 1)
                                                            <a class="text-dark m-1"
                                                                href="{{ route('display.status', ['id' => $value->id, 'field' => 'status', 'value' => 0]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('scroll{{ $value->id }}').submit();"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ __('webstring.scroll_disable') }}">
                                                                <i class="mdi mdi-align-horizontal-center mdi-24px"></i>
                                                            </a>

                                                            <form method="POST" id="scroll{{ $value->id }}"
                                                                action="{{ route('display.status', ['id' => $value->id, 'field' => 'is_scroll', 'value' => 0]) }}"
                                                                style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @else
                                                            <a class="text-success m-1"
                                                                href="{{ route('display.status', ['id' => $value->id, 'field' => 'status', 'value' => 1]) }}"
                                                                onclick="event.preventDefault(); document.getElementById('scroll{{ $value->id }}').submit();"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="{{ __('webstring.scroll_enable') }}">
                                                                <i class="mdi mdi-align-horizontal-right mdi-24px"></i>
                                                            </a>

                                                            <form method="POST" id="scroll{{ $value->id }}"
                                                                action="{{ route('display.status', ['id' => $value->id, 'field' => 'is_scroll', 'value' => 1]) }}"
                                                                style="display: none;">
                                                                @csrf
                                                                @method('PUT')
                                                            </form>
                                                        @endif


                                                        <a class="text-danger m-1"
                                                            href="{{ route('display.destroy', $value->id) }}"
                                                            onclick="event.preventDefault(); document.getElementById('del{{ $value->id }}').submit();"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="{{ __('webstring.delete') }}">
                                                            <i class="mdi mdi-trash-can mdi-24px"></i>
                                                        </a>

                                                        <form method="POST" id="del{{ $value->id }}"
                                                            action="{{ route('display.destroy', $value->id) }}"
                                                            style="display: none;">
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
        <script src="{{ asset('js/datetimepicker.js') }}"></script>

        <script>
            function myFunction() {
                if (!confirm("Are You Sure to delete this"))
                    event.preventDefault();
            }
        </script>
    @endpush
@endsection
