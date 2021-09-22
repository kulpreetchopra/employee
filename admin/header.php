<?php include("session.php");?>
<?php
error_reporting(0);
session_start();

       include ('dbcon.php');
       $pass=$_SESSION['password'];
       $user=$_SESSION['email'];
       $q = "SELECT * FROM `employee` WHERE  `password`='$pass' && `email`='$user'";
       $query = mysqli_query($con, $q);
       $result = mysqli_fetch_array($query);
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee Management</title>
  <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+<!-- <!-- 6QL9UvYjZE3Ipu6Tp75j7Bh --> -->/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="../image/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="../image/logo.png">
    <style type="text/css">
      table{
      width:100%;
      }
    #example_filter{
      float:right;
    }
    #example_paginate{
      float:right;
    }
    label{
      display: inline-flex;
      margin-bottom: .5rem;
      margin-top: .5rem;
    }
    .page-link{
      color:black!important;
      font-size:15px;
    }
    </style>
    <!------ Include the above in your HEAD tag ---------->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<div class="bgimg">
  <!-- navbar start -->
    <div class="container-fluid">
      <nav class="navbar navbar-expand-sm navbar-dark fixed-top a bg">
        <div class="container-fluid" style="background:#f24d6a54!important;">
          <a href="index.php">
            <img class="web-logo" src="../image/logo.png" width="80px" height="50px" ;>       
          </a>
          <a>
            <button class="navbar-toggler"style="background:#051c0694" data-toggle="collapse" data-target="#a">
              <span class="navbar-toggler-icon" ></span>
            </button>
          </a>
          <div class="collapse navbar-collapse" id="a">
            <ul class="navbar-nav ml-auto " style="text-align:center;">
              <li class="nav-item">
                <button type="button" class="btn"><a href="" data-target="#login" data-toggle="tab" class="nav-link"><b>Login</b></a></button>
              </li>
              <li class="n style=av-item">
                <button type="button" class="btn "><a href="logout.php" class="nav-link"><b>Logout</b></a></button>
              </li>
            </ul>
            <br>
          </div>
        </div>
      </nav>
    </div>
    <!-- navbar end -->
  <div class="topleft">
    <p><i class="fas fa-user"></i> <?php echo$result['name'];?><span class="mob">(<?php echo$result['department'];?>)</span>
      <span class="web">
        <?php 
                            if($result['department']=='frontend'){
                              ?>
                              <i class="fas fa-paint-roller"></i>
                            <?php
                            }
                            if($result['department']=='backend') {
                            ?>
                            <i class="fas fa-file-code"></i>
                            <?php
                            }
                            if($result['department']=='hr') {
                            ?>
                            <i class="fas fa-dove"></i>
                            <?php
                            }
                            if($result['department']=='pramotion') {
                            ?>
                            <i class="fab fa-instagram"></i>
                            <?php
                            }
                            ?>
      </span></p>
    <h6>employee management software</h6>
  </div>