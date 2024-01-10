<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>INSPINIA | Dashboard v.2</title>
<base href="{{env('APP_URL')}}">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="css/customize.css">
<link href="css/animate.css" rel="stylesheet">
@if(isset($config['css']) && is_array($config['css']))
    @foreach($config['css'] as $key => $value)
        {!! '<link href="'.$value.'" rel="stylesheet">' !!}
    @endforeach
@endif

<script src="js/jquery-3.1.1.min.js"></script>

