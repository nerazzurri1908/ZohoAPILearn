<!-- Styles -->
<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet"/>

<body class="bg-light">


<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4 offset-md-1 order-md-2 mb-4">
            @include('partials.navbar')
        </div>
        <div class="col-md-7 order-md-1">
            @yield('content')
        </div>
    </div>
</div>

</body>
