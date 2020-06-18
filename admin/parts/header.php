<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/admin/assets/img/admin-icon2.png">
  <link rel="icon" type="image/png" href="/admin/assets/img/admin-icon2.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Admin panel</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/admin/assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/admin/assets/demo/demo.css" rel="stylesheet" />
  <link href="/admin/assets/css/main.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
<!--
Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
<div class="logo">
  <a href="/admin" class="simple-text logo-mini">CLO</a>
  <a href="/admin" class="simple-text logo-normal">Cruise line Ocean</a>
</div>
<div class="sidebar-wrapper" id="sidebar-wrapper">
<?php
include $_SERVER['DOCUMENT_ROOT'].'/admin/parts/nav.php';
?>
</div>
  </div>