<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="AmhExperts Dashborad">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title ?? 'AMH Experts' }}</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/assets/img/amh-logo.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/img/amh-logo.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/amh-logo.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/amh-logo.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/amh-logo.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/img/amh-logo.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/amh-logo.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/amh-logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/amh-logo.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/img/amh-logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/amh-logo.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/amh-logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/amh-logo.png">

    <link rel="manifest" href="/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/img/amh-logo.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="/assets/vendors/simplebar/css/simplebar.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/css/vendors/simplebar.css"> --}}
    <!-- Main styles for this application-->
    <link href="/assets/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    {{-- <link href="/assets/css/examples.css" rel="stylesheet"> --}}
    <link href="/assets/css/dropzone.css" rel="stylesheet">

    {{-- <link href="/assets/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet"> --}}
    <link href="https://unpkg.com/@yaireo/tagify@4.17.9/dist/tagify.css" rel="stylesheet">
</head>

<body>
