
@php
  $getSettingHeader = App\Models\SystemSettingModel::getSingle();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($header_title) ? $header_title : '' }} - {{ $getSettingHeader->website_name }}</title>


  <link rel="shortcut icon" href="{{ $getSettingHeader->getFevicon() }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ url('../assets/plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ url('../assets/plugins/summernote/summernote-bs4.min.css') }}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="{{ url('../assets/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ url('../css/style.css')}}">


  @yield('style')

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">
    @include('admin.layouts.header')
    @yield('content')
    @include('admin.layouts.footer')
</div>

<script src="{{ url('../assets/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ url('../assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ url('../assets/dist/js/adminlte.js') }}"></script>
<script src="{{ url('../assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script src="{{ url('../assets/plugins/chart.js/Chart.min.js') }}"></script>

<script src="{{ url('../assets/dist/js/demo.js') }}"></script>


<script>
  $(function () {
    $('.editor').summernote({
       height: 300
    })
  })
</script>
@yield('script')

</body>
</html>
