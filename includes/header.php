<?php
  include_once 'includes/session.php'
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <title>Attendence  - <?php echo $title ?></title>
    <link rel="icon" href="uploads/title.jpg" type="image/icon type">
  </head>

  <body>
  <div style="margin-top:18px" class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="index.php" style="font-size:20px;font-family:monospace;">IT Conference</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
          <a class="nav-item nav-link active" style="font-size:20px;font-family:monospace;margin-left:29px" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" style="color:white;font-size:19px;font-family:monospace;margin-left:18px" href="viewrecords.php">View Attendees</a>
        </div>

        <div class="navbar-nav ml-auto">
          <?php
              if(!isset($_SESSION['username'])){
          ?>
            <a style="color:white;font-size:18px;font-family:sans-serif" class="nav-item nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
          <?php } else { ?>
            <a class="nav-item nav-link" href="#"><span style="color:white;font-size:18px;font-family:sans-serif">Hello <?php echo $_SESSION['username'] ?>! </span> <span class="sr-only">(current)</span></a>
            <a style="color:white;font-size:18px;font-family:sans-serif" class="nav-item nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
          <?php } ?>
        </div>

      </div>
    </nav>
    <br/>
