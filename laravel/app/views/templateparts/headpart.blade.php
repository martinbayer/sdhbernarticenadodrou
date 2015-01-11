<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>{{ $globalTitle }} {{{ isset($title)? ' | '.$title :'' }}}</title>
{{ HTML::style('favicon.ico', array('rel' =>
'icon','type'=>'image/x-icon')) }}
<!-- Bootstrap Core CSS -->
{{ HTML::style('css/bootstrap/css/bootstrap.css') }}

<!-- Custom CSS -->
{{ HTML::style('css/bootstrap/css/modern-business.css') }}

<!-- Custom Fonts -->
{{
HTML::style('css/bootstrap/font-awesome-4.1.0/css/font-awesome.min.css')
}}

{{
HTML::style('css/flags/flags.css')
}}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- {{ HTML::style('css/customization.css') }} -->
{{ HTML::style('css/customization.less', array('rel' =>
'stylesheet/less')) }}

<!-- jQuery -->
{{ HTML::script('css/bootstrap/js/jquery.js') }}

</head>