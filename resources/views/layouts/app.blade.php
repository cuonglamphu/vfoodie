@include('layouts.head')
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<body>
@include('layouts.navigation')


<main>{{$slot}}</main>


@include('layouts.footer')
</body>



