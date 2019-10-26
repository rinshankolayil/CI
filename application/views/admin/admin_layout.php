<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin panel</title>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Admin panel </div>
      <div class="list-group list-group-flush">
        <a href="<?php echo site_url('admin/index') ?>" class="list-group-item list-group-item-action bg-light">Photos</a>
        <a href="<?php echo site_url('admin/upload_view') ?>" class="list-group-item list-group-item-action bg-light"><b>Upload photo</b> (For my testing because you have not included in documentation)</a>
        <a target="_blank" href="https://github.com/BlackrockDigital/startbootstrap-simple-sidebar">Source code of admin panel (github)</a>
        <a href="<?php echo site_url('admin/logout') ?>" class="list-group-item list-group-item-action bg-light">Logout</a>
      </div>
    </div>