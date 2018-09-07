
<head>
        @foreach($css as $key => $value)
        <link href="{{url($value)}}" rel="stylesheet">
        @endforeach
        @foreach($js as $key => $value)
        <script src="{{url($value)}}"></script>
        @endforeach
    </head>