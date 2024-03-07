<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{csrf_token()}}">
<title>INSPINIA | Dashboard v.2</title>
<base href="{{env('APP_URL')}}">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/customize.css">
<link href="assets/css/animate.css" rel="stylesheet">
@if(isset($config['css']) && is_array($config['css']))
    @foreach($config['css'] as $key => $value)
        {!! '<link href="assets/'.$value.'" rel="stylesheet">' !!}
    @endforeach
@endif


