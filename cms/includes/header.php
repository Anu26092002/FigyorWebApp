<?php
ob_start();
session_start();
include "includes/dbh.php";
?>
<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Figyor</title>

  <style>
      :root {
          font-size: 16px;
          font-family: 'Open Sans';
          --textcolor1: #000000;

      }
      *{
          box-sizing: border-box;
      }
      body {
          margin: 0;
          padding: 0;
          background-color:white;
      }
      
      .navbar-top{
          
          justify-content: space-between;
          display: flex; 
          align-items: center;
          padding: 3px 10% ;
          box-shadow: 5px 0px 8px black;
          background-color:white ;

      }
      .profile-btn{
          float:left;
          padding-right: 50px;
          display:flex;
          align-items:center;
      }
      .profile-btn a{
          text-decoration: none;
          color: black;
      }
      .nav-logo{
          float:left;
      }
      .nav-logo img{
          height: 75px;
          cursor: pointer;
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .nav-logo a{
          margin: 0%;
          padding: 0%;
      }
      

      .navbar-bottom{
          display:flex;
          justify-content:center;
      }
      .left_side{
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .empty_div{
          padding-right:50px;
      }
      .nav-items{
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .nav-item{
          font-size: larger;
          font-weight: bolder;
          padding: 0.9% 2%;
          margin :3px;
          border-radius: 5px;
      }
      .nav-item a{
          padding: 10px;
          border-radius: 5px;
          text-decoration: none;
          color: var(--textcolor1);
      }
      .nav-item :hover{
          background-color: #c4bfbf;
      }
      
      
      .footer_logo{
          display:flex;
          flex-direction:column;
          justify-content: center;
          text-align: center;
          align-items:center;
      }
      .footer_logo img{
          
          height: 140px;
          padding-top: 10px;
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .footer_logo hr{
          width: 50%;
      }
      .footer_text p{
          text-align: center;
      }

      .follow_links{
          display: flex;
          justify-content: center;
      }
      .follow_links a{
          margin: 10px;
          text-decoration: none;

      }
      .follow_links a img{
          height: 30px;
      }


  </style>
</head>
<body>

