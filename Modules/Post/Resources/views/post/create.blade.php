@extends('layout.admin.home')

@section('content')

@include('common.message')
    <div class="row">

        <div class="col-xxl-12 col-xl-12 col-md-12 col-sm-12">

            <form action="{{ route('post.store') }}" method="POST" id="postfrom" enctype="multipart/form-data">
                @csrf

                <div class="card-style mb-30">
                    <h4 class="mb-25">{{ __('webstring.add') }} {{ __('webstring.post') }}</h4>


                    <div class="col-12 form-group">
                         @include('post::menu.mainmenu')
                    </div>

                    <div class="col-12 form-group">
                        @include('post::menu.submenu')
                   </div>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="subhead" class="form-label">{{ __('webstring.subhead') }}</label>
                        <input type="text" class="form-control" id="subhead" name="subhead" placeholder="{{ __('webstring.subhead') }}"  value="{{ old('subhead') }}" >

                        </div>
                        @if($errors->has('subhead'))
                            <div class="error text-danger m-2">{{ $errors->first('subhead') }}</div>
                        @endif
                    </div>


                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="head" class="form-label">{{ __('webstring.head') }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="head" name="head" placeholder="{{ __('webstring.head') }}"  value="{{ old('head') }}" required>

                        </div>
                        @if($errors->has('head'))
                            <div class="error text-danger m-2">{{ $errors->first('head') }}</div>
                        @endif
                    </div>



                    <div class="col-12">
                        <label for="detail" class="form-label">{{ __('webstring.post_detail') }} <span class="text-danger">*</span></label>
                         <div class="input-style-3">

                            <textarea placeholder="{{ __('webstring.message') }}" rows="1" class="form-control" id="detail" name="detail" required>{{ old('detail') }}</textarea>
                            <span class="icon"><i class="mdi mdi-format-text-rotation-down-vertical"></i></span>
                        </div>
                       @if($errors->has('detail'))
                            <div class="error text-danger m-2">{{ $errors->first('detail') }}</div>
                        @endif
                    </div>


                    <div class="col-12">
                        @include('post::post.postpic')
                    </div>


                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="caption" class="form-label">{{ __('webstring.caption') }}</label>
                        <input type="text" class="form-control" id="caption" name="caption" placeholder="{{ __('webstring.caption') }}"  value="{{ old('caption') }}" >

                        </div>
                        @if($errors->has('caption'))
                            <div class="error text-danger m-2">{{ $errors->first('caption') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="author" class="form-label">{{ __('webstring.reporter') }}</label>
                        <input type="text" class="form-control" id="author" name="author" placeholder="{{ __('webstring.reporter') }}"  value="{{ old('author') }}" >

                        </div>
                        @if($errors->has('author'))
                            <div class="error text-danger m-2">{{ $errors->first('author') }}</div>
                        @endif
                    </div>

                    <div class="col-12">

                        <div class="input-style-2">
                            <label for="date" class="form-label">{{ __('webstring.date') }} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="date" name="date"  value="{{ old('date') }}" required>

                        </div>


                        @if($errors->has('date'))
                            <div class="error text-danger m-2">{{ $errors->first('date') }}</div>
                        @endif
                    </div>


                    <div class="form-check form-switch toggle-switch mb-30">
                        <input class="form-check-input" type="checkbox" id="toggleSwitch1" name="fbpage" value="1" />
                        <label class="form-check-label" for="toggleSwitch1">{{ __('webstring.facebook_page_publish') }}</label>
                    </div>

                    @php
                        $root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
                        $root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
                        $naseUrl = $root;
                    @endphp
                    <input type="hidden" id="urlbase" name="urlbase"  value="{{ $naseUrl }}" >


                     <div class="col-12 mt-4 mb-3">
                         <button class="main-btn primary-btn rounded-md btn-hover" id="postBtn" type="submit">{{ __('webstring.save') }}</button>
                     </div>

                </div>
            </form>
        </div>


    </div>




@endsection

@push('sub_page_js')
    <script src="{{ asset('js/myimage.js') }}" ></script>

@endpush

@section('subpagejs')

   <script src="{{ asset('ckeditor/ckeditor.js') }}" ></script>
   <script src="{{ asset('ckfinder/ckfinder.js') }}" ></script>
   <script src="{{ asset('js/ckeditor.js') }}" ></script>
   <script src="{{ asset('js/datetimepicker.js') }}" ></script>
   <script src="{{ asset('js/common.js') }}" ></script>




@endsection
