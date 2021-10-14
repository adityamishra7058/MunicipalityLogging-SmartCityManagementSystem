<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      <?php
        if(!isset($page_title)){
          echo "Index";
        }else{
          echo $page_title;
        }
       ?>
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto+Slab:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
      h1,h2,h3,h4{
        font-family: 'Roboto Slab', serif;
      }
      body{
        margin: 0;
        font-family: 'Montserrat', sans-serif;
      }
      a:visited,a:active,a:hover,a:link{
        outline: none;
        text-decoration: none;
      }
      .logo img{
        width: 110px;
        border-radius: 90px;
        z-index: 10;
        position: fixed;
        top: 15px;
        left: 15px;
      }
      .top{
        margin: 0;
        padding: 12px;
        background-color: black;
        height: 50px;
        position: fixed;
        width: 100%;
        top: 0px;
        text-align: right;
        z-index: 8000000000000;
      }
      .top,.logo{
        transition: box-shadow 0.5s ease-in-out;
      }
      .logo:hover{
        box-shadow:0px 3px 12px 2px green;
      }
      .top-btn{
        text-decoration: none;
        color: white;
        position: relative;
        top: -3px;
        right: 25px;
        padding: 8px 30px;
        border-radius: 50px;
        display: inline-block;
        background-color: #590995;
        font-size: 22px;
        margin: 0px 5px 0px;
        transition: transform 0.3s box-shadow 0.2s ease-in-out ;
      }
      .top-btn:hover,#user img:hover,#user img:active{
          box-shadow: 0px 3px 15px 1px gray;
          transition: transform 0.3s box-shadow 0.2s ease-in-out ;
      }
      .top-btn:active{
          transform: translateY(0px);
          box-shadow: none;
          transition: transform 0.3s box-shadow 0.2s ease-in-out ;
      }
      .dropdown-user{
        display: inline-block;
        position: relative;
        top: 12px;
        right: 20px;
        margin: 0px;
        padding: 0px;
      }
      .dropbtn{
        width: 45px;
        height: 45px;
        border-radius: 23px;
      }
      .drop-content{
        width: 200px;
        position: absolute;
        right: 0px;
        background-color: #EEEEEE;
        box-shadow: 0px 3px 10px 3px #ddd;
        padding: 0px;
        font-size: 16px;
        display: none;
      }
      .dropdown-user:hover .dropbtn{
        box-shadow: 0px 3px 15px 1px gray;
      }
      .dropdown-user:hover .drop-content{
        display: block;
      }
      .drop-content a{
        display: block;
        color: black;
        padding: 10px;
        border-bottom: 3px dashed green;
        transition: background-color 0.3s color 0.3s ease-in-out;
      }
      .drop-content a:hover{
        background-color: #ddd;
        color: green;
      }
      .index-link{
        color: white;
        padding: 8px 30px;
        background-color: #590995;
        border-radius: 50px;
        font-size: 22px;
        position: relative;
        top: -14px;
        right: 10px;
      }
      .down-arrow{
        font-size: 15px;
        position: relative;
        left: 8px;
        /* padding: 4px; */
      }
    </style>
    <script>
    function shadow(x){
      x.setAttribute('style','box-shadow:0px 3px 12px 2px green;');
    }
    function no_shadow(x){
      x.setAttribute('style','box-shadow:none;');
    }
      window.addEventListener('scroll',function(){
        var a = document.querySelector('.top');
        var b = document.querySelector('.logo img');
        if(window.pageYOffset<=55){
          a.setAttribute('style','box-shadow:none;');
          b.setAttribute('style','box-shadow:none;');
        }else{
          a.setAttribute('style','box-shadow:0px 0px 10px 8px gray;');
          b.setAttribute('style','box-shadow:0px 3px 12px 2px green;');
        }
      });
    </script>
  </head>
  <body>
        <h1 class="top">
          <a class="logo" href="<?php echo url_for('/general/index.php'); ?>">
            <img class="logo" id="logo-img" onmouseover="shadow(this)" onmouseout="no_shadow(this)" src="<?php echo url_for('/images/logo.png'); ?>" alt="logo">
          </a>
          <div class="dropdown-user">
            <a class='index-link' href="<?php echo url_for("/staff/staff_index.php"); ?>">Index
              <span class='down-arrow'>&#x25BC;</span>
            </a>
            <div class="drop-content" style="right:20px;">
              <a href="<?php echo url_for("/staff/complain/complain.php"); ?>">Complain</a>
              <a href="<?php echo url_for("/staff/notice/notice.php"); ?>">Notice</a>
            </div>
          </div>
          <div class="dropdown-user">
            <img class="dropbtn" src="<?php echo url_for('/images/user_menu.svg')?>" alt="">
            <div class="drop-content">
              <a href="<?php echo url_for("/staff/staff/edit_staff.php"); ?>">Edit Profile</a>
              <a href="<?php echo url_for("/staff/staff/change_password.php"); ?>">Change Password</a>
              <a href="<?php echo url_for("/staff/logout.php"); ?>">Log out</a>
            </div>
          </div>
        </h1>
