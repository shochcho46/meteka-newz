<div class="row">

    <div class="col-5">
       
            <div class="input-style-2">
                <label for="from_date" class="form-label">{{ __('webstring.from_date') }} </label>
                <input type="text" class="form-control" id="from_date" name="from_date"  value="{{ $fromDate ?? date('Y-m-01')   }}" required>
                
            </div>
           

            @if($errors->has('from_date'))
                <div class="error text-danger m-2">{{ $errors->first('from_date') }}</div>
            @endif
        
    </div>

    <div class="col-5">
       
            <div class="input-style-2">
                <label for="to_date" class="form-label">{{ __('webstring.to_date') }} </label>
                <input type="text" class="form-control" id="to_date" name="to_date"  value="{{ $toDate ?? date('Y-m-d') }}" required>
                
            </div>
           

            @if($errors->has('to_date'))
                <div class="error text-danger m-2">{{ $errors->first('to_date') }}</div>
            @endif
        
    </div>

    <div class="col-2 mt-2 text-end">
        <div class="col-12 mt-4">
            <button class="main-btn primary-btn rounded-full btn-hover" type="submit"><i class="mdi mdi-database-search-outline mdi-24px"></i></button>
        </div>
    </div>

</div>