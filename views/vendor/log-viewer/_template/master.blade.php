<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LogViewer</title>
    <meta name="description" content="LogViewer">
    <meta name="author" content="ARCANEDEV">
    <link rel="stylesheet" href="/assets/xSystem/vendor/log-viewer/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/xSystem/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/xSystem/vendor/log-viewer/bootstrap-datetimepicker.min.css">
    <link href='/assets/xSystem/vendor/log-viewer/font.css' rel='stylesheet' type='text/css'>
    @include('log-viewer::_template.style')

</head>
<body>
@include('log-viewer::_template.navigation')

<div class="container-fluid">
    @yield('content')
</div>

@include('log-viewer::_template.footer')

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/xSystem/vendor/log-viewer/bootstrap.min.js"></script>
<script src="/assets/xSystem/vendor/log-viewer/moment-with-locales.min.js"></script>
<script src="/assets/xSystem/vendor/log-viewer/Chart.min.js"></script>
<script src="/assets/xSystem/vendor/log-viewer/bootstrap-datetimepicker.min.js"></script>
<script>
    Chart.defaults.global.responsive      = true;
    Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
    Chart.defaults.global.animationEasing = "easeOutQuart";
</script>
@yield('scripts')
</body>
</html>
