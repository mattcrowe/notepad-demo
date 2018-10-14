<!DOCTYPE html>
<html>
<head>
    @include('layouts.web.partials.head')
    @include('layouts.web.scripts.head-close')
</head>
<body>
<div id="app">
    <router-view></router-view>
</div>
@yield('main')
@include('layouts.web.scripts.body-close')
</body>
</html>
