<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @yield('title')
    </title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    {{--    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>--}}

    @include('admin.partials.css')
    <!-- Font Awesome -->
</head>
<body>
<div class="wrapper">

    @include('admin.partials.sidebar')
    <div class="main-panel">
        @include('admin.partials.header')
        <div>
            @if (session('failed'))
                <div class="alert alert-danger show-message">
                    <i>{{ session('failed') }}</i>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success show-message">
                    <i>{{ session('success') }}</i>
                </div>
            @endif
        </div>
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>


@include('admin.partials.js')
@section('scripts')
@show
@stack('js-stack')
@stack('css-stack')

</body>
</html>
