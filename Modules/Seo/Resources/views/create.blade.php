@extends('layout.admin.home')

@section('content')



    <div class="col-12">
        <div class="row">
            <div class="col-2"></div>

            <div class="col-8">

                <div class="row">

                    <div class="col-2"></div>
                    
                    <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                        <form action="{{ route('seo.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                

                                            <h3 class="card-title text-center text-capitalize">{{ __('webstring.add') }} {{ __('webstring.seo') }}</h3>
                                            <div class="row g-3">

                                                <div class="col-12">
                                                    <label for="keyword" class="form-label">{{ __('webstring.key_word') }}</label>
                                                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="{{ __('webstring.key_word') }}" value="{{ old('keyword') }}" >
                                                    @if($errors->has('keyword'))
                                                            <div class="error text-danger m-2">{{ $errors->first('keyword') }}</div>
                                                    @endif
                                             </div>

                                                <div class="col-12">
                                                <label for="title" class="form-label">{{ __('webstring.title') }}</label>
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('webstring.title') }}" value="{{ old('title') }}" >
                                                </div>

                                                @if($errors->has('title'))
                                                    <div class="error text-danger m-2">{{ $errors->first('title') }}</div>
                                                @endif

                                                <div class="col-12">
                                                    <label for="description" class="form-label">{{ __('webstring.description') }}</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3"> {{ old('description') }}</textarea>
                                                </div>

                                                @if($errors->has('description'))
                                                    <div class="error text-danger m-2">{{ $errors->first('description') }}</div>
                                                @endif

                                                <div class="col-12">
                                                    <label for="refresh" class="form-label">{{ __('webstring.refresh') }} {{ __('webstring.time') }}</label>
                                                    <input type="number" class="form-control" id="refresh" name="refresh" placeholder="{{ __('webstring.refresh') }} {{ __('webstring.time') }}" value="{{ old('refresh') }}" min="1" >
                                                </div>

                                                

                                                <div class="col-12">
                                                    <label for="gverify" class="form-label">{{ __('webstring.google_verification') }}</label>
                                                    <input type="text" class="form-control" id="gverify" name="gverify" placeholder="{{ __('webstring.google_verification') }}" value="{{ old('gverify') }}" >
                                                </div>

                                                <div class="col-12 mt-4 mb-3">
                                                    <button class="btn btn-primary btn-sm" type="submit">{{ __('webstring.save') }}</button>
                                                </div>
                                                
                                            </div>

                                        </form>

                                </div>
                            </div>
                    </div>
                    
                    <div class="col-2"></div>

                </div>


        </div>
            <div class="col-2"></div>
        </div>
        

    </div>
@endsection
