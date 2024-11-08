<meta property="og:url"                content="{{url()->current()}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{{  $data->head  }}" />
<meta property="og:description"        content="{{ strip_tags(Str::limit($data->detail, 500, $end='.......')) }}" />
<meta property="og:image"              content="{{ url('/'.$data->imgloc) }}" />
<meta property="fb:app_id"              content="{{ $facebook->appid ?: 454429773427644 }}" />  