<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" id="printarea">

                <div class="row">
                    <div class=" text-center mt-3">
                        <a href ="#">
                          <img src="{{ url('/'.$webcongigData->logo) }}" class="img-fluid" >
                        </a>
                    </div>
                    <hr>
                </div>

                <div class="row">

                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 "></div>
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 mt-2 bg-white">
                        
                        <h2 class="p-1 m-1">
                            {{ $data->head  }}
                        </h2>
                        
                            <div class=" p-1  mt-1">
                                {{ $data->author }}
                            </div>
                            <div class=" p-1 mt-1">
                                {{ $data->updated_at }} 
                            </div>
                        
                        

                        <div class=" p-1 m-1 text-center">
                            <img src="{{ url($data->imgloc) }}" class="img-fluid">
                            <br>
                            <small class="mt-1">{{ $data->caption }}</small>
                        </div>


                        @if (!empty($data->subhead))
                        <div class="row">
                            <h6 class=" p-1 m-1 text-danger">
                                {{ $data->subhead }}
                            </h6>
                        </div>
                        @endif


                        @if (!empty($data->detail))
                        <div class="row">
                            <p class=" p-1 m-1  text-dark">
                                {!! $data->detail !!}
                            </p>
                        </div>
                        @endif
                        
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-12 "></div>
                   
                </div>

                

            </div>

        </div>

    </div>
    
</body>
<script src="{{ asset('js/jquery.js') }}" ></script>
<script src="{{ asset('js/app.js') }}" ></script>
<script>
    $( document ).ready(function() {
        window.print();
    });
</script>
</html>