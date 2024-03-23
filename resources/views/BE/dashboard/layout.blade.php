<!DOCTYPE html>
<html>

<head>

    @include('BE.dashboard.component.head')
</head>

<body>
<div id="wrapper">
    @include('BE.dashboard.component.sidebar')
    <div id="page-wrapper" class="gray-bg">
        @include('BE.dashboard.component.nav')
        @include($template)
{{--        @yield('template');--}}
        {{--        footer --}}
        @include('BE.dashboard.component.footer')
    </div>

</div>

@include('BE.dashboard.component.script')

</body>
</html>
